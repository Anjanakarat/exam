<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionpaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionpaper', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('fk_classid')->unsigned();
            $table->foreign('fk_classid')->references('id')->on('classreg');
            $table->integer('fk_subjectid')->unsigned();
            $table->foreign('fk_subjectid')->references('id')->on('subject');
            $table->string('year');
            $table->mediumText('questionpaper');
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
        Schema::dropIfExists('questionpaper');
    }
}
