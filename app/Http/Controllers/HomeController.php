<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use App\Profile;
use App\Favorite;
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
        //$posts = Topic::all()->sortByDesc('updated_at');
        $page = 0;
        $limit = 3;
        if (!empty($request->page) && $request->page > 0){
            $page = $request->page;
        }
        $posts = Topic::orderBy('updated_at', 'desc')->offset($page*$limit)->limit($limit)->get();
        $count = Topic::count();
        
        return view('/home', ['posts' => $posts, 'count' => $count, 'page' => $page]);
    }
}
