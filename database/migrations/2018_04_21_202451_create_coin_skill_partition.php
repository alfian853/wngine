<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinSkillPartition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coinPart', function (Blueprint $table) {
            $table->increments('cpt_id');
            $table->integer('cpt_j_id')->unsigned();
	    $table->integer('cpt_s_id')->unsigned();
	    $table->foreign('cpt_j_id')->references('j_id')->on('job');
	    $table->foreign('cpt_s_id')->references('s_id')->on('skill');		
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coinPart');
    }
}
