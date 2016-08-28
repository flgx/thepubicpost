<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type','facebook_id','google_id','real_id','featured','profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts(){
        
        return $this->hasMany('App\Post');
    }
    public function photoposts(){
        
        return $this->hasMany('App\PhotoPost');
    }
    public function videoposts(){
        
        return $this->hasMany('App\VideoPost');
    }

    public function images(){
        
        return $this->hasMany('App\Image');
    }

}
