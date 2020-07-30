<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('examcode');
            $table->string('Exam_title');
            $table->text('description');
            $table->string('icon');
            $table->unsignedBigInteger('courseid');
            $table->unsignedBigInteger('coursetestid');
            $table->string('coursename');
            $table->string('coursetestname');



            $table->index(["courseid"], 'fk_course');


            $table->foreign('courseid', 'fk_course')
                ->references('id')->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->index(["coursetestid"], 'fk_coursetest');


                $table->foreign('coursetestid', 'fk_coursetest')
                    ->references('id')->on('coursetest')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

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
        Schema::dropIfExists('exam');
    }
}
