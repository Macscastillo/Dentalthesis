<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Medicalinfo extends Model
{
    use HasFactory, softDeletes;

    protected $table = "medicalinfo";

    protected $fillable = [
        'id',
        'basicinfos_id',
        'doc_name',
        'specialty',
        'office_address',
        'office_number',
        'q1',
        'q2',
        'sq2',
        'q3',
        'sq3',
        'q4',
        'sq4',
        'q5',
        'sq5',
        'q6',
        'q7',
        'med2infos_id',
        'pregnants_id',
        'q11',
        'q12',
        'med3infos_id',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'





    ];

}
