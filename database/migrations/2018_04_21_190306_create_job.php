<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJob extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('j_id');
	        $table->integer('cj_id')->unsigned();
	        $table->foreign('cj_id')->references('c_id')->on('company');
            $table->string('j_name',50)->unique();
	        $table->date('j_uploadDate');
	        $table->date('j_finishDate');
            $table->integer('j_point');
            $table->string('j_document',100)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
