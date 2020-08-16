<?php

namespace App\Http\Controllers;

use DB;
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
        // $this->middleware('auth');
        // 実際にBlogページは、VisitorはLogin不要なのでコメントアウト
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $posts = Post::all()->sortByDesc('created_at');
        $posts = DB::table('posts')->orderBy('created_at', 'desc')->paginate(5);

        // dd($posts);

        return view('home', compact('posts'));
    }
}
