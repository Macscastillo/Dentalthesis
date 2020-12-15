<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientControllers;
use App\Http\Controllers\AdminControllers;
use App\Http\Controllers\DropdownControllers;


//Client
Route::post('BookAppointment', [ClientControllers::class, 'setAppointment']);

//Admin
Route::post('AdminLogin', [AdminControllers::class, 'login']);
Route::post('registerUser', [AdminControllers::class, 'addUser'])->middleware('auth:api');

//API appointments
Route::get('Appointments', [AdminControllers::class, 'getAppointments'])->middleware('auth:api');
Route::post('update/{id}', [AdminControllers::class, 'updateAppointmentstatus'])->middleware('auth:api');
Route::post('cancel/{id}', [AdminControllers::class, 'cancelAppointmentstatus'])->middleware('auth:api');
Route::get('Booked', [AdminControllers::class, 'bookedAppointments'])->middleware('auth:api');

//API Patient's records
Route::post('Addpatient', [AdminControllers::class, 'addPatient'])->middleware('auth:api');
Route::get('Patient/{id}', [AdminControllers::class, 'ShowPatient'])->middleware('auth:api');

//Drop downs
Route::get('Services', [DropdownControllers::class, 'services']);
Route::get('Doctors', [DropdownControllers::class, 'doctors']);




