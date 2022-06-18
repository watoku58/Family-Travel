<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Topic;
use App\Profile;
use App\Favorite;
use App\User;
use Auth;
use App\Tag;
use Storage;

class TopicController extends Controller
{
    public function add()
    {
        return view('user.topic.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Topic::$rules);
        
        // // #(ハッシュタグ)で始まる単語を取得。結果は、$matchに多次元配列で代入される。
        // preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->tag_name, $match);
        
        // // $match[0]に#(ハッシュタグ)あり、$match[1]に#(ハッシュタグ)なしの結果が入ってくるので、$match[1]で#(ハッシュタグ)なしの結果のみを使います。
        // $tags=[];
        // foreach ($match[1] as $tag) {
        //     $record = Tag::firstOrCreate(['tag_name' => $tag]);// firstOrCreateメソッドで、tags_tableのnameカラムに該当のない$tagは新規登録される。
        //     array_push($tags, $record);// $recordを配列に追加します(=$tags)
        // };
        
        // // 投稿に紐付けされるタグのidを配列化
        // $tag_id = [];
        // foreach ($tags as $tag) {
        //     array_push($tag_id, $tag['id']);
        // };
        // $topic->tag()->attach($tag_id);// 投稿ににタグ付するために、attachメソッドをつかい、モデルを結びつけている中間テーブルにレコードを挿入します。
        
        $topic = new Topic;
        $form = $request->all();
        
        if (isset($form['image'])) {
            //$path = $request->file('image')->store('public/image');
            //$topic->image_path = basename($path);
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $topic->image_path = Storage::disk('s3')->url($path);
        } else {
            $topic->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        
        $topic->fill($form);
        $topic->user_id = Auth::id();
        $topic->save();
        
        return redirect('user/topic');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // Authが投稿した記事の内で、検索されたら検索結果を取得する
            $posts = Topic::where('user_id', Auth::id())
                            ->where(function($q) use($cond_title){
                                $q->where('title', 'like', "%{$cond_title}%")
                                  ->orWhere('travel_destination', 'like', "%{$cond_title}%")
                                  ->orWhere('body', 'like', "%{$cond_title}%");
                            })
                            ->get();
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
            //$path = $request->file('image')->store('public/image');
            //$topic_form['image_path'] = basename($path);
            $path = Storage::disk('s3')->putFile('/',$request['image'],'public');
            $topic->image_path = Storage::disk('s3')->url($path);
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
        
        if (empty($request->cond_title)) {
            $cond_title = $request->travel_destination;
        } else {
            $cond_title = $request->cond_title;
        }
        
        if ($cond_title != '') {
            $topics = Topic::where('title', 'like', "%{$cond_title}%")
                         ->orWhere('travel_destination', 'like', "%{$cond_title}%")
                         ->orWhere('body', 'like', "%{$cond_title}%")->paginate(3);
                         
            if ($topics->count() < 1){
                $topics = null;
            }
        } else {
            $topics = null;
            
        }
        
    return view('user.topic.search', ['topics' => $topics,'cond_title' => $cond_title]);
    }
}
