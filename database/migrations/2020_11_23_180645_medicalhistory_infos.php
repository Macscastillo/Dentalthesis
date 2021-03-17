<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicalhistoryInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalhistory_infos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('patient_infos_id')->unsigned();
            $table->foreign('patient_infos_id')->references('id')->on('patient_infos');

            $table->string('doc_name')->nullable();
            $table->string('specialty')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_number')->nullable();
            $table->boolean('q1')->default(0); //question 1
            $table->boolean('q2')->default(0); //question 2
            $table->string('sq2')->nullable();
            $table->boolean('q3')->default(0); //question 3
            $table->string('sq3')->nullable();
            $table->boolean('q4')->default(0); //question 4
            $table->string('sq4')->nullable();
            $table->boolean('q5')->default(0); //question 5
            $table->string('sq5')->nullable();
            $table->boolean('q6')->default(0); //question 6
            $table->boolean('q7')->default(0); //question 7
            $table->boolean('is_local_anesthetic')->default(0); //question 8
            $table->boolean('is_sulfa_drugs')->default(0); //question 8
            $table->boolean('is_aspirin')->default(0); //question 8
            $table->boolean('is_latex')->default(0); //question 8
            $table->boolean('is_antibiotics')->default(0); //question 8
            $table->string('q9')->nullable(); //question 9
            $table->boolean('is_pregnant')->default(0);
            $table->boolean('is_nursing')->default(0);
            $table->boolean('is_taking_bc')->default(0); //bc = Birth Controll
            $table->string('q11')->nullable(); //question 11
            $table->string('q12')->nullable(); //question 12

            $table->boolean('is_high_blood_pressure')->default(0);
            $table->boolean('is_Low_blood_pressure')->default(0);
            $table->boolean('is_epilepsy')->default(0);
            $table->boolean('is_aid_hiv_infection')->default(0);
            $table->boolean('is_std')->default(0);
            $table->boolean('is_fainting_seizure')->default(0);
            $table->boolean('is_rapid_weight_loss')->default(0);
            $table->boolean('is_radiation_therapht')->default(0);
            $table->boolean('is_joint_replacement_implant')->default(0);
            $table->boolean('is_heart_surgery')->default(0);
            $table->boolean('is_heart_attack')->default(0);
            $table->boolean('is_thyroid_problem')->default(0);
            $table->boolean('is_heart_desease')->default(0);
            $table->boolean('is_heart_murmur')->default(0);
            $table->boolean('is_hepatitis_liver_disease')->default(0);
            $table->boolean('is_rheumatic_fever')->default(0);
            $table->boolean('is_allergies')->default(0);
            $table->boolean('is_respiratory_problems')->default(0);
            $table->boolean('is_hepatitis_jaundice')->default(0);
            $table->boolean('is_tuberculosis')->default(0);
            $table->boolean('is_swollen_ankles')->default(0);
            $table->boolean('is_kidney_disease')->default(0);
            $table->boolean('is_diabetes')->default(0);
            $table->boolean('is_chest_pain')->default(0);
            $table->boolean('is_stroke')->default(0);
            $table->boolean('is_cancer_tumors')->default(0);
            $table->boolean('is_anemia')->default(0);
            $table->boolean('is_angina')->default(0);
            $table->boolean('is_asthma')->default(0);
            $table->boolean('is_emphysema')->default(0);
            $table->boolean('is_bleeding_problems')->default(0);
            $table->boolean('is_blood_disease')->default(0);
            $table->boolean('is_head_injuries')->default(0);
            $table->boolean('is_arthristis_rheumatism')->default(0);

            $table->timestamps();
            $table->bigInteger('updated_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicalhistory_infos');
    }
}
