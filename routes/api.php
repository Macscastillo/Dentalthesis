<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientControllers;
use App\Http\Controllers\AdminControllers;


//Client
Route::post('BookAppointment', [ClientControllers::class, 'setAppointment']);

//Admin
Route::post('AdminLogin', [AdminControllers::class, 'login']);
Route::post('registerUser', [AdminControllers::class, 'addUser'])->middleware('auth:api');
Route::get('Appointments', [AdminControllers::class, 'getAppointments']);
Route::get('Booked', [AdminControllers::class, 'bookedAppointments']);
Route::post('Addpatient', [AdminControllers::class, 'addPatient']);

