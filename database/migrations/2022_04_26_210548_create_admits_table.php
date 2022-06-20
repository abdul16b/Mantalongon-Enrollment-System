<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admits', function (Blueprint $table) {
            $table->id();
            $table->string('LRN');
            $table->integer('gradeLevel');
            $table->integer('section');
            $table->string('type')->nullable();
            $table->string('school_year')->nullable();
            $table->string('specialization')->nullable();
            $table->string('last_schoolname_attended')->nullable();
            $table->string('last_school_address')->nullable();
            $table->json('subjects')->nullable();
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
        Schema::dropIfExists('admits');
    }
}
