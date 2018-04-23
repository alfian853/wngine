<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('registrations', function (Blueprint $table) {
        $table->string('rg_name',50)->unique();
        $table->string('rg_email',50)->unique();
        $table->string('rg_token',40);
        $table->date('rg_borndate');
        $table->string('rg_address',100);
        $table->string('rg_password',40);
        $table->string('rg_telp',15);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('registrations');
    }
}
