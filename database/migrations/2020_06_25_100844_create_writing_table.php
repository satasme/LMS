<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWritingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writingquestions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('Question_Id');
            $table->string('Question_media');
            $table->string('Question_type');
            $table->string('Question');
            $table->string('Answer');
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
        Schema::dropIfExists('writingquestions');
    }
}
