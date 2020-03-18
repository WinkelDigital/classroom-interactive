<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_id');
            $table->longText('content');
            $table->integer('squence')->nullable();
            $table->text('feedback')->nullable();
            $table->char('hint')->nullable();
            $table->enum('type',['multiple','boolean','text']);
            $table->char('answer')->nullable(); // for multiple question type so null is okay 
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
        Schema::dropIfExists('questions');
    }
}
