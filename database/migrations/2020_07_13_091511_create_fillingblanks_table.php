<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFillingblanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fillingblanks', function (Blueprint $table) {
            $table->bigIncrements('Qid');
            $table->text('Question');
            $table->string('questiontype');
            $table->integer('marks');
            $table->integer('blankoptions');
            $table->unsignedBigInteger('quizid');

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
        Schema::dropIfExists('fillingblanks');
    }
}
