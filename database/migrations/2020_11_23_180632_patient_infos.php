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
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->string('email');
            $table->string('nickname');
            $table->string('address');
            $table->string('sex');
            $table->string('age');
            $table->string('nationality');
            $table->string('birthday');
            $table->string('cellphone');
            $table->string('patient_occupation');
            $table->string('company_school');
            $table->string('status');


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
