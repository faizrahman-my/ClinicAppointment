<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClinicController extends Controller
{
    //
    public function index()
    {
        return view('pages.index');
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

    public function branch() {
        return view('pages.branch');
    }
}
