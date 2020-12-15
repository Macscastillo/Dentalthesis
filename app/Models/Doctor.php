<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Doctor extends Model
{
    use HasFactory, softDeletes;

    protected $table = "docotrs";

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'
    ];

    public static function doctor($data){ 
        return $doctors = DB::table('users')
            ->select('users.id', DB::raw("CONCAT(users.fname,' ',users.lname) as Name"))
            ->where('positions_id','=',2)
            ->get();
    }
}
