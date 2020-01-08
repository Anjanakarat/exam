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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_class_id');
            $table->unsignedBigInteger('fk_subject_id');
            $table->string('correct_option');
            $table->string('title');
            $table->string('question');
            $table->foreign('fk_class_id')->references('id')->on('classreg');
            $table->foreign('fk_subject_id')->references('id')->on('subject');
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
