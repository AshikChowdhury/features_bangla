<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','status','serial'];


    public function posts(){
        return $this->hasMany('App\Post');
    }
}
