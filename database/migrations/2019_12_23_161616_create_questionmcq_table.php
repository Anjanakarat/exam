<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionmcqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionmcq', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('fk_class_id')->unsigned();
            $table->foreign('fk_class_id')->references('id')->on('classreg');
            $table->integer('fk_subject_id')->unsigned();
            $table->foreign('fk_subject_id')->references('id')->on('subject');
            $table->string('question');
            $table->string('optionA');
            $table->string('optionB');
            $table->string('optionC');
            $table->string('optionD');
            $table->string('correctanswer');
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
        Schema::dropIfExists('questionmcq');
    }
}
