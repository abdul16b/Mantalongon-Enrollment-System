<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionSubjectTable extends Migration
{

    public function up()
    {
        Schema::create('section_subject', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id');
            $table->integer('subject_id');
            $table->string('subjectname');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('section_subject');
    }
}
