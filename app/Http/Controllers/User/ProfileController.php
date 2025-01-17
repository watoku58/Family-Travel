<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Topic;
use App\Profile;
use App\Favorite;
use App\User;
use Auth;
use Storage;

class ProfileController extends Controller
{
    public function add ()
    {
        $profile = Auth::user()->profile;
        if (!empty($profile)){
            return redirect('user/profile');
        }
        
        return view('user.profile.create');
    }
    
    public function create (Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        
        if (isset($form['my_image'])) {
            //$path = $request->file('my_image')->store('public/my_image');
            //$profile->my_image_path = basename($path);
            $path = Storage::disk('s3')->putFile('/',$form['my_image'],'public');
            $profile->my_image_path = Storage::disk('s3')->url($path);
        } else {
            $profile->my_image_path = null;
        }
      
        unset($form['_token']);
        unset($form['my_image']);
      
        $profile->fill($form);
        $profile->user_id = Auth::id();
        $profile->save();
        
        return redirect('user/profile/browse');
    }
    
    public function edit (Request $request)
    {
        $profile = Auth::user()->profile;
        if (empty($profile)) {
            return redirect('user/profile/create');
        }
        return view('user.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update (Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        if ($request->remove == 'true') {
            $profile_form['my_image_path'] = null;
        } elseif ($request->file('my_image')) {
            //$path = $request->file('my_image')->store('public/my_image');
            //$profile_form['my_image_path'] = basename($path);
            $path = Storage::disk('s3')->putFile('/',$request['my_image'],'public');
            $profile->my_image_path = Storage::disk('s3')->url($path);
        } else {
            $profile_form['my_image_path'] = $profile->my_image_path;
        }
        
        unset($profile_form['my_image']);
        unset($profile_form['remove']);
        unset($profile_form['_token']);
        
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        return redirect('user/profile/browse');
    }
    
    public function browse (Request $request)
    {
        $profile = Auth::user()->profile;
        
        //ユーザーのプロフィール情報がなければ新規登録画面に移行する。
        if ($profile == null) {
            return redirect('user/profile/create');
        } else {
            $favorites = Favorite::where('user_id', Auth::id())->get();
            $topics = Topic::where('user_id', $profile->user_id)->orderBy('updated_at', 'desc')->paginate(3);
        }
        
        return view('user.profile.index', ['profile' => $profile, 'favorites' => $favorites, 'topics' => $topics]);
    }
    
    public function index (Request $request)
    {
        // if (empty($request->id)){
        //     //自分(ログイン者)のプロフィール表示
        //     return $this->view($request);
        // } else {
        //     //指定されたプロフィールを表示
        // }
        
        //1.idを指定する
        $profile = Profile::find($request->id);
        //dd($request);
        
        //2.自分のidであればbrowseにとばす
        //  自分のidでなければお気に入り情報を取得せず対象の情報を取得する
        if ($profile->user_id == Auth::id()) {
            return redirect('user\profile\browse');
        } else {
            $favorites = null;
            $topics = Topic::where('user_id', $profile->user_id)->orderBy('updated_at', 'desc')->paginate(3);
        }
        
        return view('user.profile.index', ['profile' => $profile, 'favorites' => $favorites, 'topics' => $topics]);
    }
    
    public function delete(Request $request)
    {
        $profile = Auth::user()->profile;
        if (!empty($profile)) {
            Profile::find($profile->id)->delete();
        }
        
        return redirect('user/profile/create');
    }  
}
