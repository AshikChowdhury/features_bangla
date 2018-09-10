<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    //******* Posts for landing page *******//
    public function index()
    {
        $feature = Post::where('post_type', 1)->orderBy('id', 'desc')->first();
        $subfeature1 = Post::where('post_type', 2)->orderBy('id', 'desc')->first();

        $subfeature2 = Post::where('post_type', 3)
            ->orderBy('id', 'desc')
            ->with(['photo', 'category', 'user'])
            ->first();

//        dd($subfeature2);
        return view('welcome', compact('feature', 'subfeature1', 'subfeature2'));

    }

    //******* Single post view *******//
    public function post($category, $slug){

        $post = Post::where('slug',$slug)
            ->with(['user','category','photo'])
            ->first();

        if ($post){
            $next = Post::where('id', '>', $post->id)->orderBy('id')->first();
            $previous = Post::where('id', '<', $post->id)->orderBy('id')->first();
        }

//        $comments = $post->comments()->whereIsActive(1)->get();

        return view('post', compact('post', 'next', 'previous'));
    }
}
