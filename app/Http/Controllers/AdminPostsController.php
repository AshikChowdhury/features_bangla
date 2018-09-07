<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Photo;
use App\Post;
use App\PostType;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();

        $authors = User::pluck('name','id')->all();

        $types = PostType::pluck('name','id')->all();

        return view('admin.posts.create',compact('categories','authors','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();

        $input['slug'] = bangla_slug($request->title,'-').'-'.time();

        $input['created_by'] = Auth::user()->id;

        if ($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        Post::create($input);

        Session::flash('created_post','Post Has Been Successfully Created');

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::pluck('name','id')->all();

        $authors = User::pluck('name','id')->all();

        $types = PostType::pluck('name','id')->all();

        return view('admin.posts.edit',compact('post','categories','authors','types'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCreateRequest $request, $id)
    {
        $input = $request->all();
        $input['slug'] = bangla_slug($request->title,'-').'-'.time();
        $input['updated_by'] = Auth::user()->id;

        if ($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }
//        Auth::user()->posts()->whereId($id)->first()->update($input);
        Post::whereId($id)->first()->update($input);

        Session::flash('updated_post','Post has been successfully updated');

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->photo_id != null){
            unlink(public_path().$post->photo->file);
        }

        $post->delete();

        Session::flash('deleted_post','Post Has Been Successfully Deleted');

        return redirect('/admin/posts');
    }


//******* Single post view *******//
    public function post($slug){

        $post = Post::where('slug',$slug)->first();

//        dd($post);

        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();

        $previous = Post::where('id', '<', $post->id)->orderBy('id')->first();

//        $comments = $post->comments()->whereIsActive(1)->get();

        return view('post', compact('post', 'next', 'previous'));
    }
}
