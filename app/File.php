<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class File extends Model
{
    //
    public function save_file($file){
        $path = $file->store('user_file');
        $this->public_path = $path;
        $this->real_path = $path;
        $this->save();
        return $this;
    }
    
    public function save(array $options = []){
        if(!$this->owner_id){
            $this->owner_id = Auth::id();
        }
        parent::save($options);
    }
}
