<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
     public function news(){
    	return $this->belongsTo('App\News');
    }
}
