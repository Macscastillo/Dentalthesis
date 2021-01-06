<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('midname');
            $table->string('school');
            $table->string('email');
            $table->string('username');
            $table->string('password');

            $table->foreignId('positions_id')->unsigned();
            $table->foreign('positions_id')->references('id')->on('positions');

            $table->foreignId('branches_id')->unsigned();
            $table->foreign('branches_id')->references('id')->on('branches');

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
        Schema::dropIfExists('users');
    }
}
