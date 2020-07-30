<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParagraphQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragraph_questions', function (Blueprint $table) {
            $table->bigIncrements('qid');
            $table->text('Question');
            $table->unsignedBigInteger('Answerid');
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
        Schema::dropIfExists('paragraph_questions');
    }
}
