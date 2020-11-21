<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Appointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('contact');

            $table->foreignId('branches_id');
            $table->foreign('branches_id')->references('id')->on('branches');
            
            $table->foreignId('doctors_id');
            $table->foreign('doctors_id')->references('id')->on('doctors');

            $table->foreignId('services_id');
            $table->foreign('services_id')->references('id')->on('services');

            $table->string('date');
            $table->string('time');

            $table->boolean('is_booked')->default(0);
            $table->boolean('is_cancelled')->default(0);

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
        Schema::dropIfExists('appointments');
    }
}
