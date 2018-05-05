<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('members', function (Blueprint $table) {
        $table->increments('m_id');
        $table->string('m_name',50)->unique();
        $table->string('email',50)->unique();
	      $table->date('m_borndate');
	      $table->string('m_address',100);
	      $table->string('password',72);
	      $table->string('m_telp',15);
	      $table->string('m_image',100)->nullable(true);
        $table->string('remember_token',60)
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
