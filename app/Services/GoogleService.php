<?php
// app/Services/GoogleService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class GoogleService
{
    protected $clientId;
    protected $clientSecret;
    protected $sheetId;

    public function __construct()
    {
        $this->clientId = config('services.google.client_id');
        $this->clientSecret = config('services.google.client_secret');
        $this->sheetId = config('services.google.sheet_id');
    }

    public function revokeRefreshToken($refreshToken)
    {
        Http::post('https://oauth2.googleapis.com/revoke', [
            'token' => $refreshToken
        ]);
    }

    // Refresh the access token using the refresh token
    private function refreshAccessToken($refreshToken)
    {
        $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'refresh_token' => $refreshToken,
            'grant_type' => 'refresh_token',
        ]);

        $data = $response->json();

        // Store the new access token (you can also store the expiration time)
        return $data['access_token'];
    }

    // Check if the token is expired and refresh it if needed
    private function getValidAccessToken($refreshToken)
    {
        // Check token expiration from session
        if (session('token') && Carbon::now()->lt(session('expires_at'))) {
            return session('token');
        }

        // Refresh the token
        $newAccessToken = $this->refreshAccessToken($refreshToken);

        // Store new token in session
        session([
            'token' => $newAccessToken,
            'expires_at' => Carbon::now()->addSeconds(3000)
        ]);

        return $newAccessToken;
    }

    private function getServiceAccountToken()
    {
        if (session('token') && Carbon::now()->lt(session('expires_at'))) {
            return session('token');
        }

        $keyFile = storage_path('app/public/gservice-account.json');
        $credentials = json_decode(file_get_contents($keyFile), true);

        $jwt = $this->createJWT($credentials);

        $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt
        ]);

        $data = $response->json();
        
        $accessToken = $response->json()['access_token'];

        session([
            'token' => $accessToken,
            'expires_at' => Carbon::now()->addSeconds(3000)
        ]);

        return $accessToken;
    }

    private function createJWT($credentials)
    {
        $header = json_encode(['alg' => 'RS256', 'typ' => 'JWT']);
        $now = time();
        $payload = json_encode([
            'iss' => $credentials['client_email'],
            'scope' => $credentials['scope'],
            'aud' => $credentials['token_uri'],
            'exp' => $now + 3600,
            'iat' => $now
        ]);

        $base64Header = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64Payload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        $signature = '';
        openssl_sign($base64Header . '.' . $base64Payload, $signature, $credentials['private_key'], 'SHA256');
        $base64Signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        return $base64Header . '.' . $base64Payload . '.' . $base64Signature;
    }
    
    // https://developers.google.com/workspace/sheets/api/guides/concepts#cell
    public function insertSheetValue($sheetName, $sheetRange, $values = [], $refreshToken = null, $sheetId = null)
    {
        if ($sheetId === null) {
            $sheetId = $this->sheetId;
        }
        if ($refreshToken) {
            $accessToken = $this->getValidAccessToken($refreshToken);
        } else {
            // Handle case where user does not have a refresh token
            $accessToken = $this->getServiceAccountToken();
        }
        // $accessToken = $user->sessionID;
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}"
        ])->post("https://sheets.googleapis.com/v4/spreadsheets/{$sheetId}/values/{$sheetName}{$sheetRange}:append?valueInputOption=USER_ENTERED", [
            'values' => [$values]
        ]);

        $responseData = $response->json();
        if (isset($responseData['updates']['updatedRange'])) {
            // Extract the row number from the updatedRange string using regex
            preg_match('/!([A-Z]+)(\d+):/', $responseData['updates']['updatedRange'], $matches);
            $responseData['rowNumber'] = $matches[2] ?? null;
        }

        return $responseData;
    }

    public function addSheet($sheetTitle, $targetSheetTabId, $refreshToken = null, $sheetId = null)
    {
        if ($sheetId === null) {
            $sheetId = $this->sheetId;
        }

        // Get access token
        if ($refreshToken) {
            $accessToken = $this->getValidAccessToken($refreshToken);
        } else {
            $accessToken = $this->getServiceAccountToken();
        }

        $requests = [];

        if (isset($targetSheetTabId)) {
            $requests[] = [
                'duplicateSheet' => [
                    'sourceSheetId' => $targetSheetTabId,
                    'insertSheetIndex' => 1,
                    'newSheetName' => $sheetTitle
                ]
            ];
        } else {
            // Create blank sheet
            $requests[] = [
                'addSheet' => [
                    'properties' => [
                        'title' => $sheetTitle
                    ]
                ]
            ];
        }

        // Step 3: Send batchUpdate request
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}"
        ])->post("https://sheets.googleapis.com/v4/spreadsheets/{$sheetId}:batchUpdate", [
            'requests' => $requests
        ]);

        return $response->body();
    }

    public function sheetTabExists($sheetName, $refreshToken = null, $sheetId = null)
    {
        if ($sheetId === null) {
            $sheetId = $this->sheetId;
        }

        // Get access token
        if ($refreshToken) {
            $accessToken = $this->getValidAccessToken($refreshToken);
        } else {
            $accessToken = $this->getServiceAccountToken();
        }

        // Fetch spreadsheet metadata
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}"
        ])->get("https://sheets.googleapis.com/v4/spreadsheets/{$sheetId}");

        if (!$response->successful()) {
            return false; // Could not fetch metadata, treat as not found
        }

        $sheets = $response->json()['sheets'] ?? [];

        foreach ($sheets as $sheet) {
            if (isset($sheet['properties']['title']) && $sheet['properties']['title'] === $sheetName) {
                return true;
            }
        }

        return false;
    }

    public function getSheetTabId($sheetName, $refreshToken = null, $sheetId = null)
    {
        if ($sheetId === null) {
            $sheetId = $this->sheetId;
        }
        
        // Get access token
        if ($refreshToken) {
            $accessToken = $this->getValidAccessToken($refreshToken);
        } else {
            $accessToken = $this->getServiceAccountToken();
        }

        $sheetInfo = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}"
        ])->get("https://sheets.googleapis.com/v4/spreadsheets/{$sheetId}");
        
        $sheets = $sheetInfo->json()['sheets'] ?? [];
        foreach ($sheets as $sheet) {
            if (($sheet['properties']['title'] ?? '') === $sheetName) {
                return $sheet['properties']['sheetId'];
            }
        }
        return null;
    }

    public function insertNewTableRow($targetSheetTabId, $newIndexRow = 0, $refreshToken = null, $sheetId = null)
    {
        if ($sheetId === null) {
            $sheetId = $this->sheetId;
        }
        
        // Get access token
        if ($refreshToken) {
            $accessToken = $this->getValidAccessToken($refreshToken);
        } else {
            $accessToken = $this->getServiceAccountToken();
        }
        
        
        // Insert a new table row
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}"
        ])->post("https://sheets.googleapis.com/v4/spreadsheets/{$sheetId}:batchUpdate", [
            'requests' => [[
                'insertDimension' => [
                    'range' => [
                        'sheetId' => $targetSheetTabId,
                        'dimension' => 'ROWS',
                        'startIndex' => $newIndexRow,
                        'endIndex' => $newIndexRow + 1
                    ],
                    'inheritFromBefore' => false
                ]
            ]]
        ]);
        
        return $response->body();
    }

    public function insertSheetValueSeparateTab($sheetName, $sheetRange, $values, $templateSheetName, $refreshToken = null, $sheetId = null)
    {
        $isSheetTabExist = $this->sheetTabExists($sheetName);
        $templateSheetId = $this->getSheetTabId($templateSheetName);
        
        if (!$isSheetTabExist) {
            $this->addSheet($sheetName, $templateSheetId);
            $insertedSheet = $this->insertSheetValue($sheetName, $sheetRange, $values);
            $newSheetTabId = $this->getSheetTabId($sheetName);
            $this->insertNewTableRow($newSheetTabId, $insertedSheet['rowNumber'] ?? 0);
        } else {
            $sheetTabId = $this->getSheetTabId($sheetName);
            $insertedSheet = $this->insertSheetValue($sheetName, $sheetRange, $values);
            $this->insertNewTableRow($sheetTabId, $insertedSheet['rowNumber'] ?? 0);
        }
        
        return $insertedSheet;
    }
}
