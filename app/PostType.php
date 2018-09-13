<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    protected $fillable = ['name','serial'];


    public function posts(){
        return $this->hasMany('App\Post');
    }
}
