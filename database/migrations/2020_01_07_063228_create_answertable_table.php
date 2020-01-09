<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswertableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answertable', function (Blueprint $table) {
             $table->increments('answerid');
            $table->integer('fk_examid')->unsigned();
            $table->foreign('fk_examid')->references('examid')->on('examtable');
            $table->integer('fk_questionid')->unsigned();
            $table->foreign('fk_questionid')->references('id')->on('questionmcq');
            $table->string('useranswer');
            $table->integer('status');
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
        Schema::dropIfExists('answertable');
    }
}
