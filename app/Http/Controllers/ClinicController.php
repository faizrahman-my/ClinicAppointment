<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    //
    public function index()
    {
        $ratings = Rating::all();
        $new_rating = Rating::orderBy('created_at', 'asc')->take(5)->get();
        $user = User::all();
        $userLookup = $user->keyBy('id');
        $appointment = Appointment::all();
        $appointmentLookup = $appointment->keyBy('id');
        $clinic = Clinic::all();
        $clinicLookup = $clinic->keyBy('id');

        foreach ($ratings as $rate) {
            $date = Carbon::parse($rate->created_at);

            $diff = $date->diffForHumans();
            $clinic_id = $appointmentLookup[$rate->appointment_id]->clinic_id ?? null;
            $clinic_rate[] = [
                'feedback' => $rate->feedback,
                'clinic' => $clinicLookup[$clinic_id]->branch,
                'name' => $userLookup[$rate->user_id]->username ?? 'Anon',
                'date' => $diff
            ];
        }

        foreach ($new_rating as $rate) {
            $clinic_id_new = $appointmentLookup[$rate->appointment_id]->clinic_id ?? null;
            $clinic_rate_new[] = [
                'feedback' => $rate->feedback,
                'clinic' => $clinicLookup[$clinic_id_new]->branch,
                'name' => $userLookup[$rate->user_id]->username ?? 'Anon'
            ];
        }

        $data['all_rating'] = $clinic_rate ?? [];
        $data['recent_rating'] = $clinic_rate_new ?? [];
        return view('pages.index', $data);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function service()
    {
        return view('pages.service');
    }

    public function doctor()
    {
        $doctor_list = array(
            array(
                "name" => "Dr Azril Arrifin",
                "education"=> "MB CHB (UEUK),
                MRCP (RCPUK)",
                "specialist"=> "General Paediatrics
                Neonatology",
                "role" => "Resident Doctor",
                "email" => "Azril@email.com",
                "branch"=> "Petaling Jaya",
                "image" => "DrAzril3.jpg"
            ),
            array(
                "name" => "Dr Farah Leong",
                "education"=> "MBBCH (WALES), MRCP (UK),
                FRCP (EDIN)",
                "specialist"=> "General Paediatrics
                Paediatric Respiratory Medicine",
                "role" => "Resident Doctor",
                "email" => "Farah@email.com",
                "branch"=> "Gombak",
                "image" => "dr.farah.jpg"
            ),
            array(
                "name" => "Dr Wahab Rashid",
                "education"=> "MBBS (UM),
                M.MED (ANAES) (UKM)",
                "specialist"=> "Anaesthesiology and Critical Care",
                "role" => "Resident Doctor",
                "email" => "Wahab@email.com",
                "branch"=> "Klang",
                "image" => "Dr.Wahab.jpg"
            )
        );
        return view('pages.doctor', compact('doctor_list'));
    }

    public function branch()
    {
        return view('pages.branch');
    }
}
