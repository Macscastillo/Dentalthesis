<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Appointment extends Model
{
    use HasFactory, softDeletes;

    protected $table = "appointments";

    protected $fillable = [
        'id',
        'fname',
        'lname',
        'email',
        'contact',
        'branches_id',
        'doctors_id',
        'services_id',
        'date',
        'time',
        'is_booked',
        'is_cancelled',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'

    ];

    public static function getAppointment($data){

        return $getAppointments = DB::table('appointments as appointment')
        ->select(
            DB::raw("CONCAT(appointment.fname,' ',appointment.lname) as Name"),
            'appointment.email as Email',
            'appointment.contact as Contact',

            'branch.name as Branch',
            'doctor.name as Doctor',
            'service.name as Service',

            'appointment.time as Time',
            'appointment.date as Date',)

        ->join('branches as branch', 'appointment.branches_id', '=', 'branch.id')
        ->join('doctors as doctor', 'appointment.doctors_id', '=', 'doctor.id')
        ->join('services as service', 'appointment.services_id', '=', 'service.id')
        ->get();
    }

    public static function bookedAppointment($data){

        return $bookedAppointments = DB::table('appointments as appointment')
            ->select(
                DB::raw("CONCAT(appointment.fname,' ',appointment.lname) as Name"),
                'appointment.email as Email',
                'appointment.contact as Contact',

                'branch.name as Branch',
                'doctor.name as Doctor',
                'service.name as Service',

                'appointment.time as Time',
                'appointment.date as Date',)

        ->join('branches as branch', 'appointment.branches_id', '=', 'branch.id')
        ->join('doctors as doctor', 'appointment.doctors_id', '=', 'doctor.id')
        ->join('services as service', 'appointment.services_id', '=', 'service.id')
        ->where('is_booked','=',1)
        ->get();
    }
}
