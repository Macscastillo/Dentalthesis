<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_infos', function (Blueprint $table) {
            
            $table->id();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('mname')->nullable();
            $table->string('email')->nullable();
            $table->string('nickname')->nullable();
            $table->string('address')->nullable();
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('nationality')->nullable();
            $table->string('birthday')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('patient_occupation')->nullable();
            $table->string('company_school')->nullable();
            $table->string('status')->nullable();


            $table->string('parent_fname')->nullable();
            $table->string('parent_lname')->nullable();
            $table->string('relation')->nullable();
            $table->string('parent_occupation')->nullable(); 


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
        Schema::dropIfExists('patient_infos');
    }
}
