<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class QuizAttempt extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quiz_attempts';

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
    protected $fillable = ['activity_id', 'user_id', 'point', 'start', 'finish'];

    public function activity(){
        return $this->belongsTo('App\Activities');
    }
    
    public function quiz_attempt_answers(){
        return $this->hasMany('App\QuizAttemptAnswer');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function scopeMine($query){
        return $query->whereUserId(Auth::id());
    }
    
    public function finish(){
        if(! $this->is_finished){
            $point_total = QuizAttemptAnswer::whereQuizAttemptId($this->id)->sum('point');
            $num_of_q = QuizAttemptAnswer::whereQuizAttemptId($this->id)->count();
            $this->point = $point_total;
            $this->num_of_question = $num_of_q;
            $this->score = $point_total/$num_of_q;
            $this->finish = Carbon::now();
            $this->is_finished = true;
            $this->save();
        }
    }
    
}
