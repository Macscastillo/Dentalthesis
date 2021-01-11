<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Validator;
use DB;

class ClientControllers extends Controller
{
    //
    public function setAppointment(Request $request){
        $validation = Validator::make($request->all(), [
            'fname'         => 'required|string',
            'lname'         => 'required|string',
            'email'         => 'required|email',
            'contact'       => 'required|numeric',
            'branches_id'   => 'required|exists:branches,id',
            'doctors_id'    => 'required|exists:doctors,id',
            'services_id'   => 'required|exists:services,id',
            'date'          => 'required|date_format:d-m-Y',
            'time'          => 'required|date_format:H:i',
        ]);

        if ($validation->fails()){
            $error = $validation->messages()->first();
            return response()->json([
                'response'  => false,
                'message'   => $error
            ]);
        }

        $code = rand(1111,9999);

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
            'code'          => $code
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

    public function verificationCode(Request $request){

        if($request->code != ""){
        $verifycode = DB::table('appointments')
        ->where('code','=', $request->code )->exists();

            if($verifycode){
                $activate = DB::table('appointments')
                ->where('code','=', $request->code)
                ->update(['is_active' => 1, 'code' => null]);

                if($activate){
                    return response()->json([
                        'response' => true,
                        'message'  => "Verification confirmed"
                    ]);
                }else{
                    return response()->json([
                        'response'  => false,
                        'message'   => "Something is wrong"
                    ]);
                }
            }else{
                return response()->json([
                    'response'  => false,
                    'message'   => "Wrong verification code"
                ]);
            }
        }else{
            return response()->json([
                'response'  => false,
                'message'   => "Submit your verification code"
            ]);
        }

    }
}
