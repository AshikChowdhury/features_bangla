<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $feature = Post::where('post_type', 1)
            ->with(['photo', 'category', 'user'])
            ->orderBy('id', 'desc')->first();

        $subfeature1 = Post::where('post_type', 2)
            ->orderBy('id', 'desc')
            ->with(['photo', 'category', 'user'])
            ->first();

        $subfeature2 = Post::where('post_type', 3)
            ->orderBy('id', 'desc')
            ->with(['photo', 'category', 'user'])
            ->first();

        $most_visited = Post::orderBy('visit_count', 'desc')
            ->with(['photo', 'category', 'user'])
            ->first();

        $most_visits = Post::orderBy('visit_count', 'desc')
            ->with(['photo', 'category', 'user'])
            ->skip(1)
            ->take(2)
            ->get();
        $randoms = Post::with(['photo', 'category', 'user'])
            ->inRandomOrder()
            ->take(3)
            ->distinct()
            ->get();

        $categories = Category::inRandomOrder()
            ->take(7)
            ->distinct()
            ->get();;

        $cate_posts[] = null;
        foreach ($categories as $category){
            $cate_posts[] = Post::where('category_id', $category->id)
                ->with(['category','user','photo'])
                ->orderBy('created_at', 'desc')
                ->first();
        }

        return view('welcome', compact('feature', 'subfeature1', 'subfeature2','cate_posts', 'most_visited','most_visits','randoms'));

    }

    //******* Single post view *******//
    public function post($category, $slug){

        $post = Post::where('slug',$slug)
            ->with(['user','category','photo'])
            ->first();
        $blogKey = 'blog_'. $post->id;
        if (!Session::has($blogKey)){
            $post->increment('visit_count');
            Session::put($blogKey,1);
        }

        if ($post){
            $next = Post::where('id', '>', $post->id)->orderBy('id')->first();
            $previous = Post::where('id', '<', $post->id)->orderBy('id')->first();
        }

//        $comments = $post->comments()->whereIsActive(1)->get();

        return view('post', compact('post', 'next', 'previous'));
    }

    //******* category wise page *******//
    public function CategoryPage($category){
        $find_cat = Category::whereName($category)->first();

        $posts = Post::where('category_id',$find_cat->id)
            ->with(['user','category','photo'])
            ->paginate(8);


//        dd($posts);
        return view('category_post', compact('posts','category'));
    }

}
