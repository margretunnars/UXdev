<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function tasks(){

    	return $this->hasMany('App\Task');
    }

    public function questions(){

    	return $this->hasMany('App\Question');
    }
}
