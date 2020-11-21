<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medicalinfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalinfos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('basicinfos_id');
            $table->foreign('basicinfos_id')->references('id')->on('basicinfos');

            $table->foreignId('parentinfos_id');
            $table->foreign('parentinfos_id')->references('id')->on('parentinfos');

            $table->string('doc_name')->nullable();
            $table->string('specialty')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_number')->nullable();
            $table->boolean('q1')->default(0); //question 1
            $table->boolean('q2')->default(0); //question 2
            $table->string('sq2');
            $table->boolean('q3')->default(0); //question 3
            $table->string('sq3');
            $table->boolean('q4')->default(0); //question 4
            $table->string('sq4');
            $table->boolean('q5')->default(0); //question 5
            $table->string('sq5');
            $table->boolean('q6')->default(0); //question 6
            $table->boolean('q7')->default(0); //question 7

            $table->foreignId('med2infos_id'); //question 8
            $table->foreign('med2infos_id')->references('id')->on('medical2infos');

            $table->string('q9'); //question 9

            $table->foreignId('pregnants_id'); //question 10
            $table->foreign('pregnants_id')->references('id')->on('pregnants');

            $table->string('q11'); //question 11
            $table->string('q12'); //question 12

            $table->foreignId('med3infos_id'); //question 13
            $table->foreign('med3infos_id')->references('id')->on('medical3infos');

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
        Schema::dropIfExists('medicalinfos');
    }
}
