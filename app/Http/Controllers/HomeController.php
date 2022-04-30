<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;

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
        //$profile = Profile::all();
        
        //if (count($posts) > 0) {
            //$headline = $posts->shift();
        //} else {
            //$headline = null;
        //}
        // home.blade.php ファイルを渡している
        // また View テンプレートにpostsという変数を渡している
        return view('/home', ['posts' => $posts]);
    }
}
