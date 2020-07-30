<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortAwnserQuizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_answer_quzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('question');
            $table->unsignedBigInteger('quizid');
            $table->unsignedBigInteger('correctanswerid');
            $table->index(["quizid"], 'fk_quize');
            $table->foreign('quizid', 'fk_quize')
                ->references('id')->on('quizes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            // $table->unsignedBigInteger('paraid');
            // $table->index(["paraid"], 'fk_paragraph');
            // $table->foreign('paraid', 'fk_paragraph')
            //     ->references('id')->on('paragraphs')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
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
        Schema::dropIfExists('short_answer_quzes');
    }
}
