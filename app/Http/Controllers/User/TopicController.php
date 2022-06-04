<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Topic;
use App\Profile;
use App\Favorite;
use App\User;
use Auth;

class TopicController extends Controller
{
    public function add()
    {
        return view('user.topic.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Topic::$rules);
        $topic = new Topic;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $topic->image_path = basename($path);
        } else {
            $topic->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        
        $topic->fill($form);
        $topic->user_id = Auth::id();
        $topic->save();
        
        return redirect('user/topic/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // Authが投稿した記事の内で、検索されたら検索結果を取得する
            $posts = Topic::where('user_id', Auth::id())
                            ->where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのAuthが投稿した投稿を取得する
            $posts = Topic::where('user_id', Auth::id())->get();
        }
        return view('user.topic.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        // Topic Modelからデータを取得する
        $topic = Topic::find($request->id);
        if (empty($topic)) {
            abort(404);    
        }
        return view('user.topic.edit', ['topic_form' => $topic]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Topic::$rules);
        // Topic Modelからデータを取得する
        $topic = Topic::find($request->id);
        // 送信されてきたフォームデータを格納する
        $topic_form = $request->all();
        if ($request->remove == 'true') {
            $topic_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $topic_form['image_path'] = basename($path);
        } else {
            $topic_form['image_path'] = $topic->image_path;
        }
        
        unset($topic_form['image']);
        unset($topic_form['remove']);
        unset($topic_form['_token']);
        
        // 該当するデータを上書きして保存する
        $topic->fill($topic_form)->save();
        
        return redirect('user/topic');
    }
    
    public function delete(Request $request)
    {
        // 該当するTopic Modelを取得
        $topic = Topic::find($request->id);
        // 削除する
        $topic->delete();
        return redirect('user/topic');
    }  
    
    public function browse(Request $request)
    {
        $topic = Topic::find($request->id);
        
        //自分のお気に入りだけ情報をとる
        $favorite = Favorite::where('user_id', Auth::id())
                            ->where('topic_id', $request->id)->first();
                            
        return view('user.topic.browse', ['topic' => $topic, 'favorite' => $favorite]);
    }
    
    public function search(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $topics = Topic::where('title', 'like', "%{$cond_title}%")
                         ->orWhere('travel_destination', 'like', "%{$cond_title}%")
                         ->orWhere('body', 'like', "%{$cond_title}%")->paginate(3);
        } else {
            $topics = null;
        }
        
    return view('user.topic.search', ['topics' => $topics,'cond_title' => $cond_title]);
    }
}
