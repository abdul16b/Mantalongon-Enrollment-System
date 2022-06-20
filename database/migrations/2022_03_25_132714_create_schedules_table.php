<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            // $table->bigIncrements('schedule_id');
            $table->id();
            $table->string('teacher')->nullable();
            $table->integer('gradeLevel');
            $table->string('section');
            $table->string('section_id');
            $table->string('subject')->nullable();
            $table->string('startTime')->nullable();
            $table->string('endTime')->nullable();
            $table->json('days')->nullable();
            $table->string('school_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
