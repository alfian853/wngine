<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('c_name',50)->unique();
	    $table->string('c_address',100);
	    $table->string('c_email',50);
	    $table->string('c_telp',15);
	    $table->string('c_image',100)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company');
    }
}
