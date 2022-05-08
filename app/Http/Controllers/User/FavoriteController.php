<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Topic;
use App\Profile;
use App\Favorite;
use App\User;
use Auth;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $favorite = new Favorite;
        $favorite->topic_id = $request->topic_id;
        $favorite->user_id = Auth::user()->id;
        $favorite->save();
        
        return redirect('user/topic/browse');
    }

    public function delete(Request $request)
    {
        $topic = Topic::find($request->id);
        
        $topic->favorite()->delete();
        
        return redirect('user/topic/browse');
    }
}
