<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medical2info extends Model
{
    use HasFactory, softDeletes;

    protected $table = "medical2infos";

    protected $fillable = [
        'id',
        'local_anesthetic',
        'sulfa_drugs',
        'aspirin',
        'antibiotics',
        'latex',
        'others',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'
    ];
}
