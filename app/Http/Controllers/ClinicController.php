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
        $new_rating = Rating::orderBy('created_at', 'asc')->take(3)->get();
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

        $data['all_rating'] = $clinic_rate;
        $data['recent_rating'] = $clinic_rate_new;
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
                "name" => "John Doe",
                "role" => "Developer",
                "email" => "john.doe@example.com",
                "image" => "toh.jpg"
            ),
            array(
                "name" => "Jane Smith",
                "role" => "Designer",
                "email" => "jane.smith@example.com",
                "image" => "toh.jpg"
            ),
            array(
                "name" => "Mike Johnson",
                "role" => "Manager",
                "email" => "mike.johnson@example.com",
                "image" => "toh.jpg"
            )
        );
        return view('pages.doctor', compact('doctor_list'));
    }

    public function branch()
    {
        return view('pages.branch');
    }
}
