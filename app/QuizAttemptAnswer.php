<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizAttemptAnswer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quiz_attempt_answers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['quiz_attempt_id', 'user_id', 'question_id', 'answer', 'answer_key', 'point'];

    public function question(){
        return $this->belongsTo('App\Question');
    }
    
    public function question_answer_options(){
        return $this->hasManyThrough('App\QuestionAnswerOption','App\Question');
    }
    
    public function answer_content(){
        return $this->belongsTo('App\QuestionAnswerOption','answer');
    }
    
    public function answer_key_content(){
        return $this->belongsTo('App\QuestionAnswerOption','answer_key');
    }
}
