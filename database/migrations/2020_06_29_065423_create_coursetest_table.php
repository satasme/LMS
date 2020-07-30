<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursetestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursetest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('testid');
            $table->string('test_title');
            $table->text('description');
            $table->string('icon');
            $table->unsignedBigInteger('courseid');
            $table->string('coursename');


            $table->index(["courseid"], 'fk_course');


            $table->foreign('courseid', 'fk_course')
                ->references('id')->on('courses')
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
        Schema::dropIfExists('coursetest');
    }
}
