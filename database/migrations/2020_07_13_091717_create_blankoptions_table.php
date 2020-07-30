<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlankoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blankoptions', function (Blueprint $table) {
            $table->bigIncrements('Blankid');
            $table->text('answer');
            $table->unsignedBigInteger('question_id');

            $table->index(["question_id"], 'fk_question');


            $table->foreign('question_id', 'fk_question')
                ->references('Qid')->on('fillingblanks')
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
        Schema::dropIfExists('blankoptions');
    }
}
