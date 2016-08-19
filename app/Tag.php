<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = ['name'];

    public function posts(){
    	
    	return $this->belongsToMany('App\Post')->withTimestamps();
    }

    public function scopeSearch($query, $name){
    	$thequery=$query->where('name','like','%'.$name.'%');
    	$thequery2= $query->where('name','!=',' ');
    	if(count($thequery) > 0){
    		return $thequery;
    	}else{
    		return $thequery2;
    	}
    }
}
