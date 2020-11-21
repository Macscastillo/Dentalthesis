<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Appointment;
use Validator;
use Auth;
use Hash;
use DB;

class AdminControllers extends Controller
{
    public function login(Request $request){
        $login = Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        if($login){
            $accesstoken = Auth::user()->createToken('authToken')->accessToken;
            return response()->json([
                'response'  => true,
                'message'   => "Success",
                'token'     => $accesstoken,
                'user'      => Auth::user()
            ]);
        }else{
            return response()->json([
                'response'  => false,
                'message'   => "Failed",
                'token'     => "",
                'user'      => []
            ]);
        }
    }

    public function addUser(Request $request){
        if(Auth::user()->positions_id == 1){
        $validation = Validator::make($request->all(),[
            'fname'         => 'required|string',
            'lname'         => 'required|string',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|string',
            'positions_id'  => 'required|string',
            'branches_id'   => 'required|string',
        ]);

        if($validation->fails()){
            $error = $validation->messages()->first();
                return response()->json([
                    'response' => 'false',
                    'message'  => $error
                ]);
        }

        $insertUser = User::create([
            'fname'         => $request->fname,
            'lname'         => $request->lname,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'positions_id'  => $request->positions_id,
            'branches_id'   => $request->branches_id
        ]);

        if($insertUser){
            return response()->json([
                'response'  => true,
                'message'   => "Success"
            ]);
        }else{
            return response()->json([
                'response'  => false,
                'message'   => "Something is wrong"
            ]);

        }
    }
}
    public function getAppointments(Request $request){

        $query = Appointment::getAppointment($request);

        if($query){
            return response()->json([
                'message'   => "Appointments",
                'data'      => $query
            ],200);
        }else{
            return response()->json([
                'response'  =>false,
                'message'   =>"Something is worng"
            ],200);
        } 
    }

    public function bookedAppointments(Request $request){

        $query = Appointment::bookedAppointment($request);

        if($query){
            return response()->json([
                'response'  =>true,
                'data'      =>$query
            ],200);
        }else{
            return response()->json([
                'response'  =>false,
                'message'   =>"Something is wrong"
            ],200);
        }
    }

    public function addPatient(Request $request){

        $validation = Validator::make($request->all(),[
            'fname'                             => 'required|string',
            'lname'                             => 'required|string',
            'mname'                             => 'required|string',
            'nickname'                          => 'string',
            'address'                           => 'required|string',
            'sex'                               => 'required|string',
            'age'                               => 'required|numeric',
            'nationality'                       => 'required|string',
            'birthday'                          => 'required|date_format:M/d/Y',
            'cellphone'                         => 'required|numeric',
            'occupation'                        => 'required|string',
            'company_school'                    => 'required|string',
            'status'                            => 'required|string',
            'is_minor'                          => 'boolean',

            'local_anesthetic'                  => 'boolean',
            'sulfa_drugs'                       => 'boolean',
            'aspirin'                           => 'boolean',
            'antibiotics'                       => 'boolean',
            'latex'                             => 'boolean',
            'others'                            => 'string',

            'is_pregnant'                       => 'boolean',
            'is_nursing'                        => 'boolean',
            'is_taking_bc'                      => 'boolean',

            'lname'                             => 'string',
            'fname'                             => 'string',
            'relation'                          => 'string',
            'occupation'                        => 'string',

            'is_high_blood_pressure'            => 'boolean',
            'is_Low_blood_pressure'             => 'boolean',
            'is_epilepsy'                       => 'boolean',
            'is_aid_hiv_infection'              => 'boolean',
            'is_std'                            => 'boolean',
            'is_fainting_seizure'               => 'boolean',
            'is_rapid_weight_loss'              => 'boolean',
            'is_radiation_therapht'             => 'boolean',
            'is_joint_replacement_implant'      => 'boolean',
            'is_heart_surgery'                  => 'boolean',
            'is_heart_attack'                   => 'boolean',
            'is_thyroid_problem'                => 'boolean',
            'is_heart_desease'                  => 'boolean',
            'is_heart_murmur'                   => 'boolean',
            'is_hepatitis_liver_disease'        => 'boolean',
            'is_rheumatic_fever'                => 'boolean',
            'is_allergies'                      => 'boolean',
            'is_respiratory_problems'           => 'boolean',
            'is_hepatitis_jaundice'             => 'boolean',
            'is_tuberculosis'                   => 'boolean',
            'is_swollen_ankles'                 => 'boolean',
            'is_kidney_disease'                 => 'boolean',
            'is_diabetes'                       => 'boolean',
            'is_chest_pain'                     => 'boolean',
            'is_stroke'                         => 'boolean',
            'is_cancer_tumors'                  => 'boolean',
            'is_anemia'                         => 'boolean',
            'is_angina'                         => 'boolean',
            'is_asthma'                         => 'boolean',
            'is_emphysema'                      => 'boolean',
            'is_bleeding_problems'              => 'boolean',
            'is_blood_disease'                  => 'boolean',
            'is_head_injuries'                  => 'boolean',
            'is_arthristis_rheumatism'          => 'boolean',

            'doc_name'                          => 'string',
            'specialty'                         => 'string',
            'office_address'                    => 'string',
            'office_number'                     => 'string',
            'q1'                                => 'boolean',
            'q2'                                => 'boolean',
            'sq2'                               => 'string',
            'q3'                                => 'boolean',
            'sq3'                               => 'string',
            'q4'                                => 'boolean',
            'sq4'                               => 'string',
            'q5'                                => 'boolean',
            'sq5'                               => 'string',
            'q6'                                => 'boolean',
            'q7'                                => 'boolean',
            'med2infos_id'                      => 'string',
            'pregnants_id'                      => 'string',
            'q11'                               => 'boolean',
            'q12'                               => 'boolean',
            'med3infos_id'                      => 'string',

        ]);
        
        if($validation->fails()){
            $error = $validation->messages()->first();
                return response()->json([
                    'response' => 'false',
                    'message'  => $error
                ]);
        }

        $basicinfo = DB::table('basicinfos')
            ->insert([
                'fname'             => $request->fname,
                'lname'             => $request->lname,
                'mname'             => $request->mname,
                'nickname'          => $request->nickname,
                'address'           => $request->address,
                'sex'               => $request->sex,
                'age'               => $request->age,
                'nationality'       => $request->nationality,
                'birthday'          => $request->birthday,
                'cellphone'         => $request->cellphone,
                'occupation'        => $request->occupation,
                'company_school'    => $request->company_school,
                'status'            => $request->status,
            ]);
       
        $basicinfolastId = DB::table('basicinfos')
            ->select(LAST_INSERT_ID())->get();

        $medicalinfo2 = DB::table('medical2infos')
            ->insert([
                'basicinfos_id'     => $request->$lastId,
                'local_anesthetic'  => $request->local_anesthetic,
                'sulfa_drugs'       => $request->sulfa_drugs,
                'aspirin'           => $request->aspirin,
                'antibiotics'       => $request->antibiotics,
                'latex'             => $request->latex,
                'others'            => $request->others
            ]);

        $medicalinfo2lastId = DB::table('medical2infos')
            ->select(LAST_INSERT_ID())->get();

        $pregnant = DB::table('pregnants')
            ->insert([
                'basicinfos_id'     => $request->$lastId,
                'is_pregnant'       => $request->is_pregnant,
                'is_nursing'        => $request->is_nursing,
                'is_taking_bc'      => $request->is_taking_bc
            ]);

        $pregnantlastId = DB::table('pregnants')
            ->select(LAST_INSERT_ID())->get();

        $parentinfo = DB::table('pregnants')
            ->insert([
                'basicinfos_id' => $request->$lastId,
                'fname'         => $request->fname,
                'lname'         => $request->lname,
                'relation'      => $request->relation,
                'occupation'    => $request->occupation
            ]);

        $parentlastId = DB::table('parentinfos')
            ->select(LAST_INSERT_ID())->get();

        $medicalinfo3 = DB::table('medical3infos')
            ->insert([
                'basicinfos_id'                 => $request->$lastId,
                'is_high_blood_pressure'        => $request->is_high_blood_pressure,
                'is_Low_blood_pressure'         => $request->is_Low_blood_pressure,
                'is_epilepsy'                   => $request->is_epilepsy,
                'is_aid_hiv_infection'          => $request->is_aid_hiv_infection,
                'is_std'                        => $request->is_std,
                'is_fainting_seizure'           => $request->is_fainting_seizure,
                'is_rapid_weight_loss'          => $request->is_rapid_weight_loss,
                'is_radiation_therapht'         => $request->is_radiation_therapht,
                'is_joint_replacement_implant'  => $request->is_joint_replacement_implant,
                'is_heart_surgery'              => $request->is_heart_surgery,
                'is_heart_attack'               => $request->is_heart_attack,
                'is_thyroid_problem'            => $request->is_thyroid_problem,
                'is_heart_desease'              => $request->is_heart_desease,
                'is_heart_murmur'               => $request->is_heart_murmur,
                'is_hepatitis_liver_disease'    => $request->is_hepatitis_liver_disease,
                'is_rheumatic_fever'            => $request->is_rheumatic_fever,
                'is_allergies'                  => $request->is_allergies,
                'is_respiratory_problems'       => $request->is_respiratory_problems,
                'is_hepatitis_jaundice'         => $request->is_hepatitis_jaundice,
                'is_tuberculosis'               => $request->is_tuberculosis,
                'is_swollen_ankles'             => $request->is_swollen_ankles,
                'is_kidney_disease'             => $request->is_kidney_disease,
                'is_diabetes'                   => $request->is_diabetes,
                'is_chest_pain'                 => $request->is_chest_pain,
                'is_stroke'                     => $request->is_stroke,
                'is_cancer_tumors'              => $request->is_cancer_tumors,
                'is_anemia'                     => $request->is_anemia,
                'is_angina'                     => $request->is_angina,
                'is_asthma'                     => $request->is_asthma,
                'is_emphysema'                  => $request->is_emphysema,
                'is_bleeding_problems'          => $request->is_bleeding_problems,
                'is_blood_disease'              => $request->is_blood_disease,
                'is_head_injuries'              => $request->is_head_injuries,
                'is_arthristis_rheumatism'      => $request->is_arthristis_rheumatism,
                 
            ]);

            $medicalinfo3lastId = DB::table('medical3infos')
            ->select(LAST_INSERT_ID())-get();
                
        $medicalinfo = DB::table('medicalinfos')
            ->insert([
                'basicinfos_id'     => $request->$lastId,
                'parentinfos_id'    => $request->$parentlastId,
                'doc_name'          => $request->doc_name,
                'specialty'         => $request->specialty,
                'office_address'    => $request->office_address,
                'office_number'     => $request->office_number,
                'q1'                => $request->q1,
                'q2'                => $request->q2,
                'sq2'               => $request->sq2,
                'q3'                => $request->q3,
                'sq3'               => $request->sq3,
                'q4'                => $request->q4,
                'sq4'               => $request->sq4,
                'q5'                => $request->q5,
                'sq5'               => $request->sq5,
                'q6'                => $request->q6,
                'q7'                => $request->q7,
                'med2infos_id'      => $request->$med2lastid,
                'pregnants_id'      => $request->$pregnantlastid,
                'q11'               => $request->$q11,
                'q12'               => $request->$q12,
                'med3infos_id'      => $request->$med3lastid
            ]);

            

            if($data){
                return response()->json([
                    'response'  => true,
                    'message'   => 'Patient added'
                ],200);
            }else{
                return response()->json([
                    'response'  => false,
                    'message'   => 'Something is wrong'
                ],200);
            }

    }
    
}
