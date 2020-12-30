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
        
        $query = Service::getservice($request);
        if(sizeof($query) > 0){
            $dataservice = [];
            foreach($query as $out){
                $dataservice = $out->id;
            }
        }
    
        return response()->json([
            'reposnse'  =>true,
            'data'      => $query
        ],200);
    
    }
    
    public function doctors(Request $request){
        
        $query = Doctor::getdoctors($request);
        if(sizeof($query) > 0){
            $datadocors = [];
            foreach($query as $out){
                $datadoctors = $out->id;
            }
        }
    
        return response()->json([
            'reposnse'  =>true,
            'data'      => $query
        ],200);
    
    }

    public function branches(Request $request){

        $query = Branch::getbranch($request);

        if(sizeof($query) > 0){
            $databranch = [];
            foreach($query as $out){
                $databranch = $out->id;
            }
        }
        
        return response()->json([   
            'response'  => true,
            'data'      => $query
        ]);
    }
}
