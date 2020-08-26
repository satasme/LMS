<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakingQuestionsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speaking_questions_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer_path');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('quizzesid');

            $table->foreign('userid', 'fk_user')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('quizzesid', 'fk_quizzes')
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
        Schema::dropIfExists('speaking_questions_answers');
    }
}
