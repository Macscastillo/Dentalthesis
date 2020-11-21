<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medical2infos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical2infos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('basicinfos_id');
            $table->foreign('basicinfos_id')->references('id')->on('basicinfos');

            $table->boolean('local_anesthetic')->default(0);
            $table->boolean('sulfa_drugs')->default(0);
            $table->boolean('aspirin')->default(0);
            $table->boolean('antibiotics')->default(0);
            $table->boolean('latex')->default(0);
            $table->string('others');
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
        Schema::dropIfExists('medical2infos');
    }
}
