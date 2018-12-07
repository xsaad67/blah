<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(auth()->id());
        if($user->isAdmin==1){
            $posts = Post::all();
        }else{
        $posts=$user->posts()->latest()->get();
        }
        // return $posts;
        return view('posts.listPosts',compact('posts'));
    }

    public function admin()
    { 
        return view('admin'); 
    }

}
