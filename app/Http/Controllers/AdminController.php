<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){

        $posts = Post::count();

        $categories = Category::count();

        $comments = Comment::count();

        return view('admin.index', compact('posts', 'categories', 'comments'));
    }
}
