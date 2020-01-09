<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamtableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examtable', function (Blueprint $table) {
            $table->Increments('examid');
            $table->integer('fk_nameid')->unsigned();
            $table->foreign('fk_nameid')->references('id')->on('user');
            $table->integer('fk_classid')->unsigned();
            $table->foreign('fk_classid')->references('id')->on('classreg');
            $table->integer('fk_subjectid')->unsigned();
            $table->foreign('fk_subjectid')->references('id')->on('subject');          
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
        Schema::dropIfExists('examtable');
    }
}
