<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\ClassroomMember;

class Classroom extends Model
{
    protected $fillable = ['code','name','description','owner_id'];
    
    public function members(){
        return $this->belongsToMany('App\User','classroom_members');
    }
    
    public function activities(){
        return $this->hasMany('App\Activity');
    }
    
    public function scopeMine($query){
        return $query->whereOwnerId(Auth::id());
    }
    
    public function save(array $options = []){
        if(!$this->owner_id){
            $this->owner_id = Auth::id();
        }
        if(!$this->code){
            $this->code = $this->create_code();
        }
        parent::save($options);
        ClassroomMember::firstOrCreate(array('classroom_id'=>$this->id,'user_id'=>Auth::id()));
    }
    
    private function create_code(){
        $code = str_random(6);
        if(Classroom::whereCode($code)->first()){
            return $this->create_code();
        }else{
            return $code;
        }
        
    }
}