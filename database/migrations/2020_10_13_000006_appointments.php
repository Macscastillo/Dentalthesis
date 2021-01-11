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

            $table->bigInteger('branches_id')->unsigned();
            $table->foreign('branches_id')->references('id')->on('branches');
            
            $table->bigInteger('doctors_id')->unsigned();
            $table->foreign('doctors_id')->references('id')->on('doctors');

            $table->bigInteger('services_id')->unsigned() ;
            $table->foreign('services_id')->references('id')->on('services');

            $table->string('date');
            $table->string('time');

            $table->string('code')->nullable();
            $table->boolean('is_active')->default(0);
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
