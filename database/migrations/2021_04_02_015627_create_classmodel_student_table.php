<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassmodelStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classmodel_student', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('classmodel_id')->unsigned()->index();
            $table->foreign('classmodel_id')->references('id')->on('classmodels')->onDelete('cascade');

            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classmodel_student');
    }
}
