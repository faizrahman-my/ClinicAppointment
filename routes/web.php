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
Route::get('login', [UserController::class, 'index'])->middleware('clinic.web');
Route::post('login', [UserController::class, 'redirectLoginUser'])->middleware('clinic.web');
Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [UserController::class, 'handleGoogleCallback']);
Route::get('register', [UserController::class, 'register'])->middleware('clinic.web');
Route::post('register', [UserController::class, 'createNewAccount'])->middleware('clinic.web');
Route::get('profile', [UserController::class, 'profile'])->middleware('clinic.user');
Route::put('profile', [UserController::class, 'updateProfile'])->middleware('clinic.user');
Route::put('profile/password', [UserController::class, 'changePassword'])->middleware('clinic.user');
Route::post('logout', [UserController::class, 'logout']);
Route::get('logout', [UserController::class, 'logout']);

Route::get('users', [AdminController::class, 'index'])->middleware('clinic.superadmin');
Route::get('users-list', [AdminController::class, 'userList'])->name('users-list')->middleware('clinic.superadmin');
Route::get('users/{id}', [AdminController::class, 'manageUser'])->middleware('clinic.superadmin');
Route::post('users', [AdminController::class, 'createStaffAccount'])->middleware('clinic.superadmin');
Route::post('branch', [AdminController::class, 'createClinicBranch'])->middleware('clinic.superadmin');


Route::get('appointment', [AppointmentController::class, 'index'])->middleware('clinic.patient');
Route::delete('appointment/{id}', [AppointmentController::class, 'cancelReservation'])->middleware('clinic.patient');
Route::get('appointment/reserve', [AppointmentController::class, 'reserve'])->middleware('clinic.patient');
Route::post('appointment/reserve', [AppointmentController::class, 'setReservation'])->middleware('clinic.patient');
Route::get('appointment/status/{id}', [AppointmentController::class, 'status'])->middleware('clinic.patient');
Route::get('appointment/detail/{id}', [AppointmentController::class, 'detail'])->middleware('clinic.patient');
Route::get('appointment/admin', [AppointmentController::class, 'approval'])->middleware('clinic.admin');
Route::put('appointment/admin/approve/{id}', [AppointmentController::class, 'setApprove'])->middleware('clinic.admin');
Route::put('appointment/admin/reject/{id}', [AppointmentController::class, 'setReject'])->middleware('clinic.admin');
Route::get('appointment/doctor', [AppointmentController::class, 'manage'])->middleware('clinic.doctor');
Route::put('appointment/doctor/{id}', [AppointmentController::class, 'updateStatus'])->middleware('clinic.doctor');

Route::post('rating/{id}', [RatingController::class, 'create'])->middleware('clinic.patient');
Route::delete('rating/{id}', [RatingController::class, 'destroy'])->middleware('clinic.patient');
