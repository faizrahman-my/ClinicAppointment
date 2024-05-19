<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//static + db
Route::get('/', function () {
    return view('pages/index');
});

Route::get('/about', function () {
    return view('pages/about');
});

Route::get('/service', function () {
    return view('pages/service');
});

Route::get('/doctor', function () {
    $doctor_list = array(
        array(
            "name" => "John Doe",
            "role" => "Developer",
            "email" => "john.doe@example.com",
            "image"=> "toh.jpg"
        ),
        array(
            "name" => "Jane Smith",
            "role" => "Designer",
            "email" => "jane.smith@example.com",
            "image"=> "toh.jpg"
        ),
        array(
            "name" => "Mike Johnson",
            "role" => "Manager",
            "email" => "mike.johnson@example.com",
            "image"=> "toh.jpg"
        )
    );
    return view('pages/doctor', compact('doctor_list'));
});

Route::get('/branch', function () {
    return view('pages/branch');
});


//db
Route::get('/login', function () {
    return view('pages/user/login');
});

Route::get('/register', function () {
    return view('pages/user/register');
});

Route::get('/profile', function () {
    return view('pages/user/profile');
});

Route::get('/users', function () {
    return view('pages/user/user_list');
});

Route::get('/users/{id}', function ($id) {
    return view('pages/user/manage_user', ['id'=> $id]);
});

Route::get('/appointment', function () {
    return view('pages/appointment/index');
});

Route::get('/appointment/reserve', function () {
    return view('pages/appointment/reserve');
});

Route::get('/appointment/status/{id}', function ($id) {
    return view('pages/appointment/status', ['id'=> $id]);
});

Route::get('/appointment/detail/{id}', function ($id) {
    return view('pages/appointment/detail', ['id'=> $id]);
});

Route::get('/appointment/admin', function () {
    return view('pages/appointment/admin');
});

Route::get('/appointment/doctor', function () {
    return view('pages/appointment/doctor');
});
