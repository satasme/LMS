<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagram', function (Blueprint $table) {
            $table->bigIncrements('Mid');
            $table->string('diagram');
            $table->integer('nooflables');
            $table->integer('noofquestions');
            $table->unsignedBigInteger('quizid');
            $table->index(["quizid"], 'fk_quize');
            $table->foreign('quizid', 'fk_quize')
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
        Schema::dropIfExists('diagram');
    }
}
