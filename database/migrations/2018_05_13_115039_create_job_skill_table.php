<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned();
	    	$table->integer('skill_id')->unsigned();
			$table->integer('point')->unsigned();
		    $table->foreign('job_id')->references('j_id')->on('jobs');
		    $table->foreign('skill_id')->references('s_id')->on('skills');	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_skills');
    }
}
