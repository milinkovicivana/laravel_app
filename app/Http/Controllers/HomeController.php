<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::paginate(2);

        $categories = Category::all();

        $year = Carbon::now()->year;

        return view('home/home', compact('posts', 'categories', 'year'));
    }
}
