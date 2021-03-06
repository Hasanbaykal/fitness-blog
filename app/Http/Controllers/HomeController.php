<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Profile;
use App\user;
use App\Post;
use Auth;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = DB::table('users')
                    ->join('profiles', 'users.id', '=', 'profiles.user_id')
                    ->select('users.*', 'profiles.*')
                    ->where(['profiles.user_id' => $user_id])
                    ->first();
        $posts = Post::where('status',1)->paginate(5);
        return view('home', ['profile' => $profile, 'posts' => $posts]);
    }


    public function vis()
    {
        $user_id = Auth::user()->id;
        $profile = DB::table('users')
                    ->join('profiles', 'users.id', '=', 'profiles.user_id')
                    ->select('users.*', 'profiles.*')
                    ->where(['profiles.user_id' => $user_id])
                    ->first();
        $posts = Post::where('status',0)->paginate(5);
        return view('vis', ['profile' => $profile, 'posts' => $posts]);
    }
    
}

    

