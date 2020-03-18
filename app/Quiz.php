<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quiz extends Model
{
    //
    protected $fillable = ['name', 'description','duration','created_by']; 
    
    public function questions(){
        return $this->hasMany('App\Question');
    }
    
    public function save(array $options = []){
        if(!$this->owner_id){
            $this->owner_id = Auth::id();
        }
        parent::save($options);
    }
    
    public function scopeMine($query){
        return $query->whereOwnerId(Auth::id());
    }
}
