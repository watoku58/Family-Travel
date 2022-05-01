<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'users_id' => 'required',
        'nickname' => 'required',
        'favorite_travel_destination' => 'required',
        'self_introduction' => 'required',
    );
}
