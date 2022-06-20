<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{

    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('LRN');
            $table->string('PSA_num')->nullable();
            $table->integer('average')->nullable();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('gender');
            $table->string('IPC');
            $table->string('motherTongue');
            $table->string('contact_number');
            $table->longText('address');
            $table->integer('zipcode');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('guardian');
            $table->string('guardian_contact_number');
            $table->string('status');
            $table->integer('gradeLevel');
            $table->string('section');
            $table->string('type')->nullable();
            $table->string('school_year')->nullable();
            $table->string('specialization')->nullable();
            $table->string('last_schoolname_attended')->nullable();
            $table->string('last_school_address')->nullable();
            $table->json('subjects')->nullable();
            $table->timestamps();
        });

    }


    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
