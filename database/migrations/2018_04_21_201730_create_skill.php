<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkill extends Migration
{
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
