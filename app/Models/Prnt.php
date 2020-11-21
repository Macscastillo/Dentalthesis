<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prnt extends Model
{
    use HasFactory, softDeletes;

    protected $table = "parentinfos";
    protected $fillable = [
        'id',
        'fname',
        'lname',
        'relation',
        'occupation',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'
    ];
}
