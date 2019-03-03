<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Category;
use App\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/post/{slug}', ['as'=>'home.post','uses'=>'AdminPostsController@post']);

Route::get('/category/{id}', ['as'=>'home.category','uses'=>'AdminPostsController@postsByCategory']);

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', 'AdminController@index');

    Route::resource('/admin/users', 'AdminUsersController', ['names'=>[

        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',

    ]]);

    Route::resource('/admin/posts', 'AdminPostsController', ['names'=>[

        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',

    ]]);

    Route::resource('/admin/categories', 'AdminCategoriesController', ['names'=>[

        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',

    ]]);

    Route::resource('/admin/photos', 'AdminPhotosController', ['names'=>[

        'index' => 'admin.photos.index',
        'create' => 'admin.photos.create',
        'store' => 'admin.photos.store',
        'edit' => 'admin.photos.edit',

    ]]);

    Route::resource('/admin/comments', 'PostCommentsController', ['names'=>[

        'index' => 'admin.comments.index',
        'create' => 'admin.comments.create',
        'store' => 'admin.comments.store',
        'edit' => 'admin.comments.edit',
        'show' => 'admin.comments.show',

    ]]);

    Route::resource('/admin/comments/replies', 'CommentRepliesController', ['names'=>[

        'show' => 'admin.comments.replies.show'

    ]]);

});

Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

    Route::post('/comment/store', 'PostCommentsController@store');


});

Route::any('/search', function (){

    $q = Input::get('q');

    $posts = Post::where('title', 'LIKE', '%' . $q . '%')->orWhere('body', 'LIKE', '%' . $q . '%')->paginate(2);

    $categories = Category::all();

    $year = Carbon::now()->year;

    if(count($posts) > 0){

        return view('home/home', compact('posts', 'categories', 'year'));
    }else{

        return view('home/home', compact('posts', 'categories', 'year'))->withMessage('No posts found.');
    }

});

