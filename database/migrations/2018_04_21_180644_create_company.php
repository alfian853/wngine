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
            $table->string('email',50)->unique();
            $table->string('password',60);
            $table->string('c_name',50)->unique();
      	    $table->string('c_address',100);
      	    $table->string('c_telp',15);
            $table->string('c_image',100)->nullable(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('company');
    }
}
