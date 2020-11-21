<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medical3info extends Model
{
    use HasFactory, softDeletes;

    protected $table = "medical3infos";

    protected $fillable = [
        'id',
        'is_high_blood_pressure',
        'is_Low_blood_pressure',
        'is_epilepsy',
        'is_aid_hiv_infection',
        'is_std',
        'is_fainting_seizure',
        'is_rapid_weight_loss',
        'is_radiation_therapht',
        'is_joint_replacement_implant',
        'is_heart_surgery',
        'is_heart_attack',
        'is_thyroid_problem',
        'is_heart_desease',
        'is_heart_murmur',
        'is_hepatitis_liver_disease',
        'is_rheumatic_fever',
        'is_allergies',
        'is_respiratory_problems',
        'is_hepatitis_jaundice',
        'is_tuberculosis',
        'is_swollen_ankles',
        'is_kidney_disease',
        'is_diabetes',
        'is_chest_pain',
        'is_stroke',
        'is_cancer_tumors',
        'is_anemia',
        'is_angina',
        'is_asthma',
        'is_emphysema',
        'is_bleeding_problems',
        'is_blood_disease',
        'is_head_injuries',
        'is_arthristis_rheumatism',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_at'
    ];
}
