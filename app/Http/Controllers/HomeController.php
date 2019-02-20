<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Headline;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contributors = User::where('user_type', 'admin')->get();

        $posts = Post::orderBy('created_at', 'desc')->limit(10)->get();

        $headlines = Headline::orderBy('created_at', 'desc')->limit(10)->get();

        return view('home')->with('contributors', $contributors)->with('posts', $posts)->with('headlines', $headlines);
    }
}
