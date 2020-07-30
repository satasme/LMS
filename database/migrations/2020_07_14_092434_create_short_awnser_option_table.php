<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortAwnserOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_answer_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('shortanswer_value');
            $table->unsignedBigInteger('shortquiz_id');
            $table->index(["shortquiz_id"], 'fk_shortquiz');
            $table->foreign('shortquiz_id', 'fk_shortquiz')
                ->references('id')->on('short_answer_quzes')
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
        Schema::dropIfExists('short_answer_options');
    }
}
