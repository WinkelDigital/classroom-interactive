<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $fillable = ['type','rel_id','name','duration','status','classroom_id','max_attempts'];
    
    public function classroom(){
        return $this->belongsTo('App\Classroom');
    }
    
    public function quiz(){
        return $this->belongsTo('App\Quiz', 'rel_id');
    }
    
    public function topic(){
        return $this->belongsTo('App\Topic', 'rel_id');
    }
    public function file(){
        return $this->belongsTo('App\File', 'rel_id');
    }
    
    public function quiz_attempts(){
        return $this->hasMany('App\QuizAttempt','activity_id');
    }
}
