<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Medical_History;
use App\Models\Patient;
use Validator;
use Auth;
use Hash;
use DB;
use Carbon\Carbon;
use Nexmo;

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
        //if(Auth::user()->positions_id == 1){
        $validation = Validator::make($request->all(),[
            'fname'         => 'required|string',
            'lname'         => 'required|string',
            'midname'       => 'required|string',
            'school'        => 'required|string',
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
            'midname'       => $request->midname,
            'school'        => $request->school,
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
    //}
}

    //View queue appointments
    public function getAppointments(Request $request){
        
        if(Auth::user()->positions_id == 1 || Auth::user()->positions_id == 2){
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
    }

    //appointment is good
    public function updateAppointmentstatus(Request $request){

        if(Auth::user()->positions_id == 1 || Auth::user()->positions_id == 2){

            $query = Appointment::appointmentStatus($request);

            // if($query){
                
            //     Nexmo::message()->send([
            //         'to'   => $contact[0]->contact,
            //         'from' => '+639217215984',
            //         'text' => 'Your appointment request is approved'
            
            //     ]);

                return response()->json([
                    'response'  => true,
                    'message'   => "Appointment is booked"
                ]);

            }else{
                return response()->json([
                    'response'  => false,
                    'message'   => "Something is wrong",
                    'data'      => []
                ], 200);
            }
    
        }        
    
    //cancel appointment
    public function cancelAppointmentstatus(Request $request){

        if(Auth::user()->positions_id == 1 || Auth::user()->positions_id == 2){
            $query = Appointment::statusCancelled($request);
            if($query){
                return response()->json([
                    'response'  => true,
                    'message'   => "Appointment is canceled",
                ]);
            }else{
                return response()->json([
                    'response'  => false,
                    'message'   => "Something is wrong",
                    'data'      => []
                ], 200);
            }
    
        }        
    }

    //View all Booked 
    public function bookedAppointments(Request $request){

        if(Auth::user()->positions_id == 1 || Auth::user()->positions_id == 2){
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
    }

    //Drop down Services
    public function services(Request $request){
        
        $query = Service::service($request);

        return response()->json([
            'reposnse'  =>true,
            'data'      => $query
        ]);

    }

    public function addPatient(Request $request){

        if(Auth::user()->positions_id == 1 || Auth::user()->positions_id == 2){
        $validation = validator::make($request->all(),[
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
            'patient_occupation'                => 'required|string',
            'company_school'                    => 'required|string',
            'status'                            => 'required|string',
            'parent_lname'                      => 'string',
            'parent_fname'                      => 'string',
            'relation'                          => 'string',
            'parent_occupation'                 => 'string',
            
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
            'is_local_anesthetic'               => 'boolean',
            'is_sulfa_drugs'                    => 'boolean',
            'is_aspirin'                        => 'boolean',
            'is_latex'                          => 'boolean',
            'is_antibiotics'                    => 'boolean',
            'q11'                               => 'boolean',
            'q12'                               => 'boolean',
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
            'is_arthristis_rheumatism'          => 'boolean'
        ]);

        if($validation->fails()){
            $error = $validation->messages()->first();
                return response()->json([
                    'response' => 'false',
                    'message'  => $error
                ]);
        }

        $firstform = DB::table('patient_infos')
        ->insertGetId([
            'fname'                 => $request->fname,
            'lname'                 => $request->lname,
            'mname'                 => $request->mname,
            'nickname'              => $request->nickname,
            'address'               => $request->address,
            'sex'                   => $request->sex,
            'age'                   => $request->age,
            'nationality'           => $request->nationality,
            'birthday'              => $request->birthday,
            'cellphone'             => $request->cellphone,
            'patient_occupation'    => $request->patient_occupation,
            'company_school'        => $request->company_school,
            'status'                => $request->status,
            'parent_fname'          => $request->parent_fname,
            'parent_lname'          => $request->parent_lname,
            'relation'              => $request->relation,
            'parent_occupation'     => $request->parent_occupation
        ]);

        $secondform = DB::table('medicalhistory_infos')
        ->insert([
            'patient_infos_id'              => $firstform,
            'doc_name'                      => $request->doc_name,
            'specialty'                     => $request->specialty,
            'office_address'                => $request->office_address,
            'office_number'                 => $request->office_number,
            'q1'                            => $request->q1,
            'q2'                            => $request->q2,
            'sq2'                           => $request->sq2,
            'q3'                            => $request->q3,
            'sq3'                           => $request->sq3,
            'q4'                            => $request->q4,
            'sq4'                           => $request->sq4,
            'q5'                            => $request->q5,
            'sq5'                           => $request->sq5,
            'q6'                            => $request->q6,
            'q7'                            => $request->q7,
            'is_local_anesthetic'           => $request->is_local_anesthetic,
            'is_sulfa_drugs'                => $request->is_sulfa_drugs,
            'is_aspirin'                    => $request->is_aspirin,
            'is_latex'                      => $request->is_latex,
            'is_antibiotics'                => $request->is_antibiotics,
            'q9'                            => $request->q9,
            'q11'                           => $request->q11,
            'q12'                           => $request->q12,

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
            'is_arthristis_rheumatism'      => $request->is_arthristis_rheumatism
        ]);

            if (true){
                return response()->json([
                    'response'  => true,
                    'message'   => "Patient Added"
                ],200);
            }else{
                return response()->json([
                    'response'  => false,
                    'message'   => "Something is wrong"
                ]);
            }
        }
    }

    public function ShowPatient(Request $request){

        if(Auth::user()->positions_id == 1 || Auth::user()->positions_id == 2){
            return $showpatient = DB::table('medicalhistory_infos as mh')
            ->select('patient.fname as First name',
            'patient.mname as Middle name',
            'patient.lname as Last name',
            'patient.nickname as Nickname',
            'patient.address as Address',
            'patient.sex as Sex',
            'patient.nationality as Nationality',
            'patient.birthday as Birthday',
            'patient.cellphone as Cellphone number',
            'patient.patient_occupation as Occupation',
            'patient.company_school as Company/School',
            'patient.status as Status',
            DB::raw("CONCAT(patient.parent_fname,' ',patient.parent_lname) as Name"),
            'patient.relation as Relation',
            'patient.parent_occupation as p.Occupation',

            'mh.doc_name as Doctor Name',
            'mh.specialty as Specialty',
            'mh.office_address as Office Address',
            'mh.office_number as Office Number',
            'mh.q1 as Question 1',
            'mh.q2 as Question 2',
            'mh.sq2 as Sub Question 2',
            'mh.q3 as Question 3',
            'mh.sq3 as Sub Question 3',
            'mh.q4 as Question 4',
            'mh.sq4 as Sub Question 4',
            'mh.q5 as Question 5',
            'mh.sq5 as Sub Question 5',
            'mh.q6 as Question 6',
            'mh.q7 as Question 7',
            'mh.q9 as Question 9',
            'mh.q11 as Question 11',
            'mh.q12 as Question 12',

            'mh.is_high_blood_pressure as High Blood Pressure',
            'mh.is_Low_blood_pressure as Low Blood Pressure',
            'mh.is_epilepsy as Epilepsy',
            'mh.is_aid_hiv_infection as AIDS/HIV infection',
            'mh.is_std as Sexually Transmitted Disease',
            'mh.is_fainting_seizure as Fainting Seizure',
            'mh.is_rapid_weight_loss as Rapid Weight Loss',
            'mh.is_radiation_therapht as Radiation Theraphy',
            'mh.is_joint_replacement_implant as Joint Replacement Implant',
            'mh.is_heart_surgery as Heart Surgery',
            'mh.is_heart_attack as Heart Attack',
            'mh.is_thyroid_problem as Thyroid Problem',
            'mh.is_heart_desease as Heart Disease',
            'mh.is_heart_murmur as Heart Murmur',
            'mh.is_hepatitis_liver_disease as Hepatitis/Liver Disease',
            'mh.is_rheumatic_fever as Rheumatic Fever',
            'mh.is_allergies as Allergies',
            'mh.is_respiratory_problems as Respiratory Problems',
            'mh.is_hepatitis_jaundice as Hepatitis/Jaundice',
            'mh.is_tuberculosis as Tuberculosis',
            'mh.is_swollen_ankles as Swollen Ankles',
            'mh.is_kidney_disease as Kidney Disease',
            'mh.is_diabetes as Diabetes',
            'mh.is_chest_pain as Chest pain',
            'mh.is_stroke as Stroke',
            'mh.is_cancer_tumors as Cancer/Tumors',
            'mh.is_anemia as Anemia',
            'mh.is_angina as Angina',
            'mh.is_asthma as Asthma',
            'mh.is_emphysema as Emphysema',
            'mh.is_bleeding_problems as Bleeding Problems',
            'mh.is_blood_disease as Blood Disease',
            'mh.is_head_injuries as Head Injuries',
            'mh.is_arthristis_rheumatism as Arthritis/Rheumatism')
            ->join('patient_infos as patient', 'mh.patient_infos_id','=','patient.id')
            ->where('patient.id','=', $request->id)
            ->get();
        }
    }

    public function updatePatient(Request $request){
        
        if(Auth::user()->positions_id == 1){
            
            $now = Carbon::now('Asia/Manila');

            $firstform = DB::table('patient_infos as patient')
            ->update([
                'fname'                 => $request->fname,
                'lname'                 => $request->lname,
                'mname'                 => $request->mname,
                'nickname'              => $request->nickname,
                'address'               => $request->address,
                'sex'                   => $request->sex,
                'age'                   => $request->age,
                'nationality'           => $request->nationality,
                'birthday'              => $request->birthday,
                'cellphone'             => $request->cellphone,
                'patient_occupation'    => $request->patient_occupation,
                'company_school'        => $request->company_school,
                'status'                => $request->status,
                'parent_fname'          => $request->parent_fname,
                'parent_lname'          => $request->parent_lname,
                'relation'              => $request->relation,
                'parent_occupation'     => $request->parent_occupation,
                'patient.updated_at'    => $now,
                'patient.updated_by'    => Auth::user()->id
            ]);

            $secondform = DB::table('medicalhistory_infos as mh')
            ->update([
                'doc_name'                      => $request->doc_name,
                'specialty'                     => $request->specialty,
                'office_address'                => $request->office_address,
                'office_number'                 => $request->office_number,
                'q1'                            => $request->q1,
                'q2'                            => $request->q2,
                'sq2'                           => $request->sq2,
                'q3'                            => $request->q3,
                'sq3'                           => $request->sq3,
                'q4'                            => $request->q4,
                'sq4'                           => $request->sq4,
                'q5'                            => $request->q5,
                'sq5'                           => $request->sq5,
                'q6'                            => $request->q6,
                'q7'                            => $request->q7,
                'is_local_anesthetic'           => $request->is_local_anesthetic,
                'is_sulfa_drugs'                => $request->is_sulfa_drugs,
                'is_aspirin'                    => $request->is_aspirin,
                'is_latex'                      => $request->is_latex,
                'is_antibiotics'                => $request->is_antibiotics,
                'q9'                            => $request->q9,
                'q11'                           => $request->q11,
                'q12'                           => $request->q12,

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
                'mh.updated_at'                 => $now,
                'mh.updated_by'                 => Auth::user()->id
            ]);

            if(true){
                return response()->json([
                    'response'  => true,
                    'message'   => 'Patient record successfully updated'
                ]);
            }else{
                return response()->json([
                    'response'  => false,
                    'message'   => 'Something is wrong'
                ]);
            }
        }
    }

    public function newDentalrecord (Request $request, $id){

        $now = Carbon::now('Asia/Manila');

        $previousbalance = DB::connection('mysql')
        ->table('medical_records as mr')
        ->select('mr.patient_id', 'mr.balance')
        ->where('patient_id','=', $request->id)
        ->latest()
        ->get();

        $newbalance = DB::table('services')
        ->select('price')
        ->where('id','=', $request->services_id)
        ->get();

        if(sizeof($previousbalance) == 0){

            $balance = (0 + $newbalance[0]->price - $request->paid);

            $insertnewrecord = DB::table('medical_records')
            ->insert([
                'patient_id'    => $id,
                'teeths_id'     => $request->teeths_id,
                'services_id'   => $request->services_id,
                'amount'        => $newbalance[0]->price,
                'paid'          => $request->paid,
                'balance'       => $balance,
                'created_at'    => $now
            ]);

            if($insertnewrecord){
                return response()->json([
                    'response'  => true,
                    'message'   => "New record has been added",
                    'total'     => $balance
                ]);
            }else{
                return response()->json([
                    'response'  => false,
                    'message'   => "Something is wrong"
                ]);
            }
        }else{
        
        $newbalance = DB::table('services')
        ->select('price')
        ->where('id','=', $request->services_id)
        ->get();

            $balance = ($previousbalance[0]->balance + $newbalance[0]->price - $request->paid);

            $insertnewrecord = DB::table('medical_records')
            ->insert([
                'patient_id'    => $id,
                'teeths_id'     => $request->teeths_id,
                'services_id'   => $request->services_id,
                'amount'        => $newbalance[0]->price,
                'paid'          => $request->paid,
                'balance'       => $balance,
                'created_at'    => $now
            ]);

            if($insertnewrecord){
                return response()->json([
                    'response'  => true,
                    'message'   => "New record has been added",
                    'total'     => $balance
                ]);
            }else{
                return response()->json([
                    'response'  => false,
                    'message'   => "Something is wrong"
                ]);
            }
        }
    }

    public function dentalRecord (Request $request, $id){

        $now = Carbon::now('Asia/Manila');

        $previousbalance = DB::connection('mysql')
        ->table('medical_records as mr')
        ->select('mr.patient_id', 'mr.balance')
        ->where('patient_id', $request->id)
        ->latest()
        ->get();
  
        
        $balance = ($previousbalance[0]->balance - $request->paid);

        $insertdentalrecord = DB::table('medical_records')
        ->insert([
            'patient_id'    => $id,
            'teeths_id'     => $request->teeths_id,
            'services_id'   => $request->services_id,
            'amount'        => $previousbalance[0]->balance,
            'paid'          => $request->paid,
            'balance'       => $balance,
            'created_at'    => $now
        ]);
        
        if($insertdentalrecord){
            return response()->json([
                'response'          => true,
                'message'           => 'Dental record successfully updated',
                'total balance'     => $balance
            ]);
        }else{
            return response()->json([
                'response'  => false,
                'message'   => 'Something is wrong'
            ]);
        }
        }
    }
    

