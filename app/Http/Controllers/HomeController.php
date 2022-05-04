<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use App\Profile;
use App\User;
use Auth;

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
        return view('home');
    }
    
    public function browse(Request $request)
    {
        $posts = Topic::all()->sortByDesc('updated_at');
        $profile = Profile::where('nickname');
        
        return view('/home', ['posts' => $posts, 'profile' => $profile]);
    }
}
