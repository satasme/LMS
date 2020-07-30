<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiagramquizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('diagramquizes', function (Blueprint $table) {
            $table->bigIncrements('dqid');
            $table->string('blank');
             $table->string('correctlabel');
            $table->unsignedBigInteger('diagramid');
            $table->index(["diagramid"], 'fk_quize');
           $table->foreign('diagramid', 'fk_quize')
                  ->references('Mid')->on('diagram')
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
        //
    }
}
