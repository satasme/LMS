<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcqoptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('option_value');
            $table->unsignedBigInteger('question_id');

            $table->index(["question_id"], 'fk_question');


            $table->foreign('question_id', 'fk_question')
                ->references('id')->on('mcqquizes')
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
        Schema::dropIfExists('mcqoptions');
    }
}
