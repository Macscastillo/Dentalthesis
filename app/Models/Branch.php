<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Branch extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'
    ];

    public static function getbranch($data){
        return $branches = DB::connection('mysql')
            ->table('branches')
            ->select(
                'branches.id', 
                'branches.name'
            )->get();
    }
}
