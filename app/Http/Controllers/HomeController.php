<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
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
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $posts = Post::where('user_id','=',$userId)->get();
        return view('posts.dashboard')->with('posts',$posts);
        //return view('posts.dashboard')->with('posts',$user->posts)
    }
}
