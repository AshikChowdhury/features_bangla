<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Category;
use App\Post;
//Route::get('/', function () {
//    return view('welcome');
//});

Route::auth();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index');

Route::get('/post/{category}/{slug}', ['as'=>'home.post', 'uses'=>'HomeController@post']);

Route::get('/post/{category}', ['as'=>'home.category', 'uses'=>'HomeController@CategoryPage']);

Route::group(['middleware'=>'admin'],function (){

    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('admin/users', 'AdminUsersController',['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit',
    ]]);

    Route::resource('admin/posts', 'AdminPostsController',['names'=>[

            'index'=>'admin.posts.index',
            'create'=>'admin.posts.create',
            'store'=>'admin.posts.store',
            'edit'=>'admin.posts.edit',
    ]]);

    Route::resource('admin/categories', 'AdminCategoriesController',['names'=>[

        'index'=>'admin.categories.index',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit',
    ]]);

    Route::resource('admin/posttypes', 'AdminPostTypesController',['names'=>[
        'index'=>'admin.types.index',
        'store'=>'admin.types.store',
        'edit'=>'admin.types.edit',
    ]]);

    Route::resource('admin/media', 'AdminMediasController',['names'=>[

        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit',
    ]]);

    Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');

    Route::resource('admin/comments', 'PostCommentsController',['names'=>[

        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
//        'edit'=>'admin.comments.edit',
    ]]);

    Route::resource('admin/comment/replies', 'CommentsRepliesController', ['names'=>[

        'index'=>'admin.replies.index',
        'create'=>'admin.replies.create',
        'store'=>'admin.replies.store',
        'show'=>'admin.comments.show',
    ]]);

});

Route::group(['middleware'=>'auth'],function (){
    Route::post('comment/reply', 'CommentsRepliesController@createReply');
});


//**** View Composer ****//
View::composer(['layouts.blog-post','includes.post_sidebar'], function ($view){
    $categories = Category::where('status',1)
        ->take(7)
        ->orderBy('serial')
        ->get();

    $total_cats = Category::count();
    $skip = count($categories);
    $more_categories = Category::where('status',1)
        ->skip($skip)
        ->take($total_cats-$skip)
        ->orderBy('serial')
        ->get();

    $editor = Post::where('post_type', 4)
        ->with(['photo', 'category', 'user'])
        ->orderBy('id', 'desc')->first();

    $editor_others = Post::where('post_type', 4)
        ->with(['photo', 'category', 'user'])
        ->orderBy('id', 'desc')
        ->skip(1)
        ->take(4)
        ->get();

    $side_most_visits = Post::orderBy('visit_count', 'desc')
        ->with(['photo', 'category', 'user'])
        ->skip(3)
        ->take(5)
        ->get();

    $view->with('categories', $categories)
         ->with('more_categories', $more_categories)
         ->with('editor', $editor)
         ->with('editor_others', $editor_others)
         ->with('side_most_visits', $side_most_visits);
});