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
   
     public static function getservice($data){
         return $services = DB::connection('mysql')
          ->table('services')
          ->select('services.id',
          	'services.name')
          ->get();
     }

}


