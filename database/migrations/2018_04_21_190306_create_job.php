<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJob extends Migration
{
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->increments('j_id');
	    $table->integer('cj_id')->unsigned();
	    $table->foreign('cj_id')->references('c_id')->on('company');
            $table->string('j_name',50)->unique();
	    $table->date('j_uploadDate');
	    $table->date('j_finishDate');
	    $table->integer('j_point');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job');
    }
}
