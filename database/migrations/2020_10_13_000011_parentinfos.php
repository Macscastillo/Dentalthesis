<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parentinfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentinfos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('basicinfos_id');
            $table->foreign('basicinfos_id')->references('id')->on('basicinfos');

            $table->string('fname');
            $table->string('lname');
            $table->string('relation');
            $table->string('occupation');            
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
        Schema::dropIfExists('parentinfos');
    }
}
