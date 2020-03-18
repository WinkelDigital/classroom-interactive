<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class ClassroomMember extends Model
{
    
    protected $fillable = ['user_id','classroom_id'];
    
    public function classroom(){
        return $this->belongsTo('App\Classroom');
    }
    
    public function member(){
        return $this->belongsTo('App\User');
    }
    
    public function classrooms(){
        return $this->hasMany('App\Classroom');
    }
    
    public function members(){
        return $this->hasMany('App\User');
    }
    
    public function update_last_activities(){
        $this->last_activities = Carbon::now();
        $this->save();
        return $this;
    }
}
