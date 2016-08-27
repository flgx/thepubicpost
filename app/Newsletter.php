<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = "newsletters";

    protected $fillable = ['email','ebook_id'];

    public function ebook(){
    	return $this->belongsTo('App/Ebook');
    }
}
