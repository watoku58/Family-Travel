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
    public function toggle(Request $request)
    {
        $favorite = Favorite::where('user_id', Auth::id())
                            ->where('topic_id', $request->topic_id)
                            ->first();
        if (empty($favorite)){
            //お気に入り未登録
            //お気に入りを登録する
            $favorite = new Favorite;
            $favorite->topic_id = $request->topic_id;
            $favorite->user_id = Auth::id();
            $favorite->save();
        }else{
            //お気に入り登録済み
            //お気に入りを削除する
            $favorite->delete();
        }
        
        return redirect('user/topic/browse?id='. $request->topic_id);
        //return back();
    }

}
