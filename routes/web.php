<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ClinicController::class, 'index']);
Route::get('about', [ClinicController::class, 'about']);
Route::get('service', [ClinicController::class, 'service']);
Route::get('doctor', [ClinicController::class, 'doctor']);
Route::get('branch', [ClinicController::class, 'branch']);


//db
Route::get('login', [UserController::class, 'index']);
Route::post('login', [UserController::class, 'redirectLoginUser']);
Route::get('register', [UserController::class, 'register']);
Route::post('register', [UserController::class, 'createNewAccount']);
Route::get('profile', [UserController::class, 'profile'])->middleware('clinic.user');
Route::post('logout', [UserController::class, 'logout']);

Route::get('users', [AdminController::class, 'index']);
Route::get('users/{id}', [AdminController::class, 'manageUser']);

Route::get('appointment', [AppointmentController::class, 'index'])->middleware('clinic.patient');
Route::delete('appointment/{id}', [AppointmentController::class, 'cancelReservation'])->middleware('clinic.patient');
Route::get('appointment/reserve', [AppointmentController::class, 'reserve'])->middleware('clinic.patient');
Route::post('appointment/reserve', [AppointmentController::class, 'setReservation'])->middleware('clinic.patient');
Route::get('appointment/status/{id}', [AppointmentController::class, 'status'])->middleware('clinic.patient');
Route::get('appointment/detail/{id}', [AppointmentController::class, 'detail'])->middleware('clinic.patient');
Route::get('appointment/admin', [AppointmentController::class, 'approval']);
Route::put('appointment/admin/approve/{id}', [AppointmentController::class, 'setApprove']);
Route::put('appointment/admin/reject/{id}', [AppointmentController::class, 'setReject']);
Route::get('appointment/doctor', [AppointmentController::class, 'manage']);
Route::put('appointment/doctor/{id}', [AppointmentController::class, 'updateStatus']);

Route::post('rating/{id}', [RatingController::class, 'create'])->middleware('clinic.patient');
Route::delete('rating/{id}', [RatingController::class, 'destroy'])->middleware('clinic.patient');
