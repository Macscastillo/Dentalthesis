<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pregnants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('basicinfos_id');
            $table->foreign('basicinfos_id')->references('id')->on('basicinfos');

            $table->boolean('is_pregnant')->default(0);
            $table->boolean('is_nursing')->default(0);
            $table->boolean('is_taking_bc')->default(0); //bc = Birth Controll
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
        Schema::dropIfExists('pregnants');
    }
}
