<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('quizid');
            $table->string('quizname');
            $table->string('coursename');
            $table->string('coursetest');
            $table->string('exam');
            $table->decimal('time',4,2);
            $table->string('papercat');
            $table->unsignedBigInteger('courseid');
            $table->unsignedBigInteger('coursetestid');
            $table->unsignedBigInteger('examid');
            $table->unsignedBigInteger('papercatid');
            
           

            $table->index(["courseid"], 'fk_course');


            $table->foreign('courseid', 'fk_course')
                ->references('id')->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->index(["coursetestid"], 'fk_coursemode');


                $table->foreign('coursetestid', 'fk_coursemode')
                    ->references('id')->on('coursetest')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                    $table->index(["examid"], 'fk_exam');

                    $table->foreign('examid', 'fk_exam')
                    ->references('id')->on('exam')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

                    $table->index(["papercatid"], 'fk_papercat');


                    $table->foreign('papercatid', 'fk_papercat')
                        ->references('id')->on('papercategories')
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
        Schema::dropIfExists('quizes');
    }
}
