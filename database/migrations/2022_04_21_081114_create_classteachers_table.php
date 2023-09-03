<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classteachers', function (Blueprint $table) {
            $table->bigIncrements('teachersId');
            $table->bigInteger('userId_fk')->unsigned();
            $table->foreign('userId_fk')->references('id')->on('users');
            $table->bigInteger('departmentId_fk')->unsigned();
            $table->foreign('departmentId_fk')->references('departmentId')->on('departments');
            $table->string('academicSemesters');
            $table->integer('isClassTeacher');
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
        Schema::dropIfExists('classteachers');
    }
}
