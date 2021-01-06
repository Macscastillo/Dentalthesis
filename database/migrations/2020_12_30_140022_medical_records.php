<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicalRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patient_infos');
            
            $table->bigInteger('teeths_id')->unsigned();
            $table->foreign('teeths_id')->references('id')->on('teeth_codes');
            
            $table->bigInteger('services_id')->unsigned();
            $table->foreign('services_id')->references('id')->on('services');

            $table->string('amount');
            $table->string('paid');
            $table->string('balance');

            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
}
