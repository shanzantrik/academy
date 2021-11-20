<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function course(){
    	return $this->belongsTo(Course::class);
    }

     public function fees(){
    	return $this->hasMany(Fee::class);
    }
}
