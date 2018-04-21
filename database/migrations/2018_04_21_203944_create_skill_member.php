<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skillPoint', function (Blueprint $table) {
            $table->integer('spm_m_id')->unsigned();
            $table->integer('spm_s_id')->unsigned();
	    $table->integer('spm_point');
	    $table->foreign('spm_m_id')->references('m_id')->on('member');
	    $table->foreign('spm_s_id')->references('s_id')->on('skill');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skillPoint');
    }
}
