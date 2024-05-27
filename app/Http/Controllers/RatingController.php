<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class RatingController extends Controller
{
    //
    public function create(Request $request, $id) {

        $user = User::where('username', session('username'))->first();
        $input = $request->validate([
            'feedback' => 'required',
        ]);
        $feedbackData = ['feedback' => $input['feedback'], 'user_id' => $user->id, 'appointment_id' => base64_decode($id)];
        $feedback = Rating::create($feedbackData);
        return redirect('appointment/detail/'.$id);
    }

    public function destroy(Request $request, $id) {
        $appointment = $request->query('id');
        $rating = Rating::where('id', $id)->first();
        $rating->delete();
        return redirect('appointment/detail/'.$appointment);
    }
}
