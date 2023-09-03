<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('studentId');
            $table->bigInteger('userId_fk')->unsigned();
            $table->foreign('userId_fk')->references('id')->on('users');
            $table->bigInteger('departmentId_fk')->unsigned();
            $table->foreign('departmentId_fk')->references('departmentId')->on('departments');
            $table->string('academicYear');
            $table->string('academicSemesters');
            $table->string('regNum')->nullable();
            $table->string('parentName')->nullable();
            $table->string('address')->nullable();
            $table->integer('pincode')->nullable();
            $table->bigInteger('subject1')->unsigned()->nullable();
            $table->foreign('subject1')->references('subjectId')->on('subjects');
            $table->bigInteger('subject2')->unsigned()->nullable();
            $table->foreign('subject2')->references('subjectId')->on('subjects');
            $table->bigInteger('subject3')->unsigned()->nullable();
            $table->foreign('subject3')->references('subjectId')->on('subjects');
            $table->bigInteger('subject4')->unsigned()->nullable();
            $table->foreign('subject4')->references('subjectId')->on('subjects');
            $table->bigInteger('subject5')->unsigned()->nullable();
            $table->foreign('subject5')->references('subjectId')->on('subjects');
            $table->bigInteger('subject6')->unsigned()->nullable();
            $table->foreign('subject6')->references('subjectId')->on('subjects');
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
        Schema::dropIfExists('students');
    }
}
