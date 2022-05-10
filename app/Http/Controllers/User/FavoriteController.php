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
    public function browse(Request $request)
    {
        // 該当するTopic Modelを取得
        $topic = Topic::find($request->id);
        
        return view('user.topic.browse', ['topic' => $topic]);
    }
    
    public function store(Request $request)
    {
        $favorite = new Favorite;
        $favorite->topic_id = $request->topic_id;
        $favorite->user_id = Auth::id();
        $favorite->save();
        
        return redirect('user/topic/browse?id='. $request->topic_id);
        //return back();
    }

    public function destroy(Request $request)
    {
        $topic = Topic::find($request->id);
        
        $topic->favorite()->delete();
        
        return redirect('user/topic/browse', [$request->topic_id]);
    }

}
