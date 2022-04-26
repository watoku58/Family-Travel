<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
    public function add ()
    {
        return view('user.profile.create');
    }
    
    public function create (Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        if (isset($form['my_image'])) {
            $path = $request->file('my_image')->store('public/my_image');
            $profile->my_image_path = basename($path);
        } else {
            $profile->my_image_path = null;
        }
      
        unset($form['_token']);
      
        unset($form['my_image']);
      
        $profile->fill($form);
        $profile->save();

        return view('user.profile.create');
    }
    
    public function edit ()
    {
        return view('user.profile.edit');
    }
    
    public function update ()
    {
        return view('user.profile.edit');
    }
}
