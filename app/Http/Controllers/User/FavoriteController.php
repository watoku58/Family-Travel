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
    // FavoriteControllerのstoreを使って保存しようとするとエラーが出る。原因不明
    
    // public function store(Request $request)
    // {
    //     $favorite = new Favorite;
    //     $favorite->topic_id = $request->topic_id;
    //     $favorite->user_id = Auth::id();
    //     $favorite->save();
        
    //     return redirect('user/topic/browse?id='. $request->topic_id);
    //     //return back();
    // }

    public function destroy(Request $request)
    {
        $favorite = Favorite::where('topic_id', $request->topic_id)->first();
        
        $favorite->delete();
        
        //return redirect('user/topic/browse?id='. $request->topic_id);
        return back();
    }

}
