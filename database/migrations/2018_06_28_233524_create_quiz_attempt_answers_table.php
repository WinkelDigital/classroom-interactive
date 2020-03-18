<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizAttemptAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_attempt_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('squence')->nullable();
            $table->integer('quiz_attempt_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('question_id')->nullable();
            $table->string('answer')->nullable();
            $table->string('answer_key')->nullable();
            $table->integer('point')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quiz_attempt_answers');
    }
}
