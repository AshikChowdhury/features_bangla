<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'user_id',
        'post_type',
        'created_by',
        'updated_by',
        'category_id',
        'slug',
        'photo_id',
        'photo_source',
        'title',
        'body'

    ];
    protected $dates = [
        'created_at',
        'updated_at'
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
