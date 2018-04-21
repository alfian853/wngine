<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkill extends Migration
{
    public function up()
    {
        Schema::create('skill', function (Blueprint $table) {
            $table->increments('s_id');
            $table->string('s_name',50);
        });
    }

    public function down()
    {
        Schema::dropIfExists('skill');
    }
}
