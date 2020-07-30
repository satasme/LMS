<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMcqquizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcqquizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('Question');
            $table->integer('marks');
            $table->integer('options');
            $table->unsignedBigInteger('quizid');
            $table->unsignedBigInteger('correctoptionid');

            $table->index(["quizid"], 'fk_course');


            $table->foreign('quizid', 'fk_course')
                ->references('id')->on('quizes')
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
        Schema::dropIfExists('mcqquizes');
    }
}
