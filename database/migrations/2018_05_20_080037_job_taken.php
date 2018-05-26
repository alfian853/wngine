<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class jobTaken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_taken', function (Blueprint $table) {
            $table->string('worker_email',64);
            $table->foreign('worker_email')->references('email')->on('members');
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->integer('status')->unsigned();
            $table->string('comment',100);
            $table->string('submission_path',128);
            $table->dateTime('last_submit_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_taken');
    }
}
