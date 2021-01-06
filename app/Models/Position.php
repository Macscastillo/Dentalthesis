<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Position extends Model
{
    use HasFactory, softDeletes;

    protected $table = "positions";

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'
    ];

    public static function getpositions($data){
        return $postion = DB::connection('mysql')
            ->table('positions')
            ->select( 
                'positions.id',
                'positions.name'
            )->get();
    }
}
