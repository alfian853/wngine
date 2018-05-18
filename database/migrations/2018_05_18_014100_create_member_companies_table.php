<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_companies', function (Blueprint $table) {
            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')->references('m_id')->on('members');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('c_id')->on('company');
            $table->string('content',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_companies');
    }
}
