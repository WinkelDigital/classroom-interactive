<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerOption extends Model
{
    protected $fillable = ['question_id','answer_option','point'];
    
    public function question(){
        return $this->belongsTo('App\Question');
    }
}
