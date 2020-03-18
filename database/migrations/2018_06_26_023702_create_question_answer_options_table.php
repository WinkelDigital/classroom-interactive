<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionAnswerOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answer_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->integer('squence')->nullable();
            $table->text('answer_option');
            $table->enum('type',['radio','checkbox'])->nullable();
            $table->float('point');
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
        Schema::dropIfExists('question_answer_options');
    }
}
