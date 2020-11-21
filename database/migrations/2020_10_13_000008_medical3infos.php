<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medical3infos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical3infos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('basicinfos_id');
            $table->foreign('basicinfos_id')->references('id')->on('basicinfos');

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
        Schema::dropIfExists('medical3infos');
    }
}
