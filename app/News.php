<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    
    public function category(){
    	return $this->belongsTo('App\Category','category_id');
    }
     public function source(){
    	return $this->hasMany('App\Source');
    }

     public function rss(){
    	return $this->hasMany('App\Rss');
    }

    public function comment()
    {
    	return $this->hasMany('App\News');
    } 
}
