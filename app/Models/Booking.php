<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, softDeletes;

    protected $table = "bookings";

    protected $fillable = [
        'id',
        'fname',
        'lname',
        'date',
        'time',
        'services_id',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'
    ];
}
