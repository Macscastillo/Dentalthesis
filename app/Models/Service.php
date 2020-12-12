<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Service extends Model
{
    use HasFactory, softDeletes;

   protected $table = "services";
   
     public static function service($data){
         return $services = DB::table('services')
          ->select('services.id','services.name')
          ->get();
     }

}


