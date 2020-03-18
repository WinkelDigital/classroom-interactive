<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Topic extends Model
{
    //
    protected $fillable = ['name','description','summary','type','content'];
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
