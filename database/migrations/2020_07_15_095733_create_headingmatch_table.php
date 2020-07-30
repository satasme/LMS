<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadingmatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headingmatch', function (Blueprint $table) {
            $table->bigIncrements('hmid');
            $table->string('paragraphname');
            $table->text('content');
            $table->unsignedBigInteger('quizid');
            $table->unsignedBigInteger('headingid');

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
        Schema::dropIfExists('headingmatch');
    }
}
