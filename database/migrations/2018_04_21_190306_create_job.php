<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJob extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('description', 250)->unique();
	        $table->integer('company_id')->unsigned();
	        $table->date('upload_date');
	        $table->date('finish_date');
            $table->string('document',100)->unique();
	        $table->foreign('company_id')->references('c_id')->on('company');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
