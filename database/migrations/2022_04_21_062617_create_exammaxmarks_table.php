<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExammaxmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_max_marks', function (Blueprint $table) {
            $table->bigIncrements('exammarksId');
            $table->bigInteger('departmentId_fk')->unsigned();
            $table->foreign('departmentId_fk')->references('departmentId')->on('departments');
            $table->string('academicYear');
            $table->string('academicSemesters');
            $table->integer('internal1')->nullable();
            $table->integer('internal2')->nullable();
            $table->integer('internal3')->nullable();
            $table->integer('exam');
            $table->integer('totalMarks');
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
        Schema::dropIfExists('exam_max_marks');
    }
}
