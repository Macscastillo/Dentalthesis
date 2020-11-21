<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Validator;

class ClientControllers extends Controller
{
    //
    public function setAppointment(Request $request){
        $validation = Validator::make($request->all(), [
            'fname'         => 'required|string',
            'lname'         => 'required|string',
            'email'         => 'required|email',
            'contact'       => 'required|numeric|unique:appointments',
            'branches_id'   => 'required|string',
            'doctors_id'    => 'required|string',
            'services_id'   => 'required|string',
            'date'          => 'required|date_format:m-d-Y',
            'time'          => 'required|date_format:h:i',
        ]);

        if ($validation->fails()){
            $error = $validation->messages()->first();
            return response()->json([
                'response'  => false,
                'message'   => $error
            ]);
        }

        $insertClient = Appointment::create([
            'fname'         => $request->fname,
            'lname'         => $request->lname,
            'email'         => $request->email,
            'contact'       => $request->contact,
            'branches_id'   => $request->branches_id,
            'doctors_id'    => $request->doctors_id,
            'services_id'   => $request->services_id,
            'date'          => $request->date,
            'time'          => $request->time,
            
        ]);

        if($insertClient){
            return response()->json([
                'response' => true,
                'message'  => "Success"
            ],200);
        }
        else {
            return response()->json([
                'response' => false,
                'message'  => "Fail"
            ],200);
        }
    }
}
