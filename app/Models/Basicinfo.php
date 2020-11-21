<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basicinfo extends Model
{
    use HasFactory, softDeletes;

    protected $table = "basicinfos";

    protected $fillable = [
        'id',
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
        'occupation',
        'company_school',
        'status',
        'is_minor',
        'parentinfos_id',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'















    ];
}
