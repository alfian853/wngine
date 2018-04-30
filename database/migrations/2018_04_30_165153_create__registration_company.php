<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('registrationsCompany', function (Blueprint $table) {
        $table->string('rgc_name',50)->unique();
        $table->string('rgc_email',50)->unique();
        $table->string('rgc_token',40);
        $table->string('rgc_address',100);
        $table->string('rgc_password',40);
        $table->string('rgc_telp',15);
	$table->string('rgc_image',100)->unique();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RegistrationCompany');
    }
}
