<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Patient extends Model
{
    use HasFactory, softDeletes;

    protected $table = "patient_infos";

    protected $fillable = [
        'fname',
        'lname',
        'mname',
        'nickname',
        'address',
        'sex',
        'age',
        'nationality',
        'birthday',
        'cellphone',
        'patient_occupation',
        'company_school',
        'status',

        'parent_fname',
        'parent_lname',
        'relation',
        'parent_occupation',

        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'
        
    ];

}
