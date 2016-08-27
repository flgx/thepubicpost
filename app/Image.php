<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['name','post_id','ebook_id','videopost_id','photopost_id'];

    public function post(){
    	
    	return $this->belongsTo('App\Post');
    }   
    public function postvideo(){
    	
    	return $this->belongsTo('App\PostVideo');
    }   
    public function postphoto(){
    	
    	return $this->belongsTo('App\PostPhoto');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
