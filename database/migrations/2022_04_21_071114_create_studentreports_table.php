<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentreports', function (Blueprint $table) {
            $table->bigIncrements('studentReportId');
            $table->bigInteger('userId_fk')->unsigned();
            $table->foreign('userId_fk')->references('id')->on('users');
            $table->bigInteger('studentId_fk')->unsigned();
            $table->foreign('studentId_fk')->references('studentId')->on('students');
            $table->float('subject1Internal1')->default('0');
            $table->float('subject2Internal1')->default('0');
            $table->float('subject3Internal1')->default('0');
            $table->float('subject4Internal1')->default('0');
            $table->float('subject5Internal1')->default('0');
            $table->float('subject6Internal1')->default('0');
            $table->float('internal1Total')->default('0');
            $table->float('internal1Percentage')->default('0');
            $table->float('subject1Internal2')->default('0');
            $table->float('subject2Internal2')->default('0');
            $table->float('subject3Internal2')->default('0');
            $table->float('subject4Internal2')->default('0');
            $table->float('subject5Internal2')->default('0');
            $table->float('subject6Internal2')->default('0');
            $table->float('internal2Total')->default('0');
            $table->float('internal2Percentage')->default('0');
            $table->float('subject1Exam')->default('0');
            $table->float('subject2Exam')->default('0');
            $table->float('subject3Exam')->default('0');
            $table->float('subject4Exam')->default('0');
            $table->float('subject5Exam')->default('0');
            $table->float('subject6Exam')->default('0');
            $table->float('examTotal')->default('0');
            $table->float('examPercentage')->default('0');
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
        Schema::dropIfExists('studentreports');
    }
}
