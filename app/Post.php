<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'user_id',
        'category_id',
        'slug',
        'photo_id',
        'title',
        'body'

    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function photoPlaceHolder(){
        return "http://placehold.it/700x200";
    }

    public function photoPlaceHolder1(){
        return "http://placehold.it/400x350";
    }
}
