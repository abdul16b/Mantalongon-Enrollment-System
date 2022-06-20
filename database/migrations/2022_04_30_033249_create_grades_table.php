<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('LRN');
            $table->string('student_id');
            $table->string('subjects');
            $table->string('firstGrading')->nullable();
            $table->string('secondGrading')->nullable();
            $table->string('thirdGrading')->nullable();
            $table->string('fourthGrading')->nullable();
            $table->string('finalGrade')->nullable();
            $table->string('school_year')->nullable();
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
        Schema::dropIfExists('grades');
    }
}
