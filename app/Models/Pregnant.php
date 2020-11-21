<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pregnant extends Model
{
    use HasFactory, softDeletes;

    protected $table = "pregnants";
    protected $fillable = [
        'id',
        'is_pregnant',
        'is_nursing',
        'is_taking_bc',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'
    ];
}
