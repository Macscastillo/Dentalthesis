<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Service;
use DB;

class DropdownControllers extends Controller
{
    public function services(Request $request){
        
        $query = Service::service($request);
    
        return response()->json([
            'reposnse'  =>true,
            'data'      => $query
        ]);
    
    }
    
    public function doctors(Request $request){
        
        $query = Doctor::doctor($request);
    
        return response()->json([
            'reposnse'  =>true,
            'data'      => $query
        ]);
    
    }
}
