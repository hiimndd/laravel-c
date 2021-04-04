<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_student', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('class_id')->unsigned()->index();
            $table->foreign('class_id')->references('id')->on('class_models')->onDelete('cascade');

            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id')->references('mssv')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_student');
    }
}
