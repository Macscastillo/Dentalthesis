<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Appointment;
use Carbon\Carbon;
use Validator;
use DB;
use Nexmo;

class ClientControllers extends Controller
{
    //
    public function setAppointment(Request $request){
        
        $validation = Validator::make($request->all(), [
            'fname'         => 'required|string',
            'lname'         => 'required|string',
            'email'         => 'required|email',
            'contact'       => 'required|numeric|unique:appointments',
            'branches_id'   => 'required|exists:branches,id',
            'doctors_id'    => 'required|exists:doctors,id',
            'services_id'   => 'required|exists:services,id',
            'date'          => 'required|date_format:Y-m-d',
            'time'          => 'required|date_format:g:i A',
        ]);

        if ($validation->fails()){
            $error = $validation->messages()->first();
            return response()->json([
                'response'  => false,
                'message'   => $error
            ]);
        }

        $code = rand(1111,9999);

        $now = Carbon::now('Asia/Manila');
        $hrs = Carbon::now('Asia/Manila')->addHours(2);
        $today = Carbon::today();
        $preftime = $request->time;
        $prefdate = $request->date;
        
    
        if($preftime <= $hrs && $preftime <= $now){
            return response()->json([
                'response'  => false,
                'message'   => "Prefered time must be ahead of 2 hours before the appointment"
            ]);
        }if($prefdate < $today){
            return response()->json([
                'response'  => false,
                'message'   => "Prefered date not valid"
            ]);
        }else{    
        $insertClient = Appointment::create([
            'fname'         => $request->fname,
            'lname'         => $request->lname,
            'email'         => $request->email,
            'contact'       => $request->contact,
            'branches_id'   => $request->branches_id,
            'doctors_id'    => $request->doctors_id,
            'services_id'   => $request->services_id,
            'date'          => $request->date,
            'time'          => $preftime,
            'code'          => $code
        ]);
        }

        if($insertClient){

                // Nexmo::message()->send([
                //     'to'   => '+639217215984',
                //     'from' => '+639217215984',
                //     'text' => 'Your verification code is:'. $code
            
                // ]);

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
                ->update(['is_active' => 1, 'code' => null, 'contact' => 0]);

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
