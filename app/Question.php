<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['quiz_id','content','squence','feedback','hint','type','answer'];
    
    public function question_answer_options(){
        return $this->hasMany('App\QuestionAnswerOption');
    }
    
    public function quiz(){
        
    }
}
