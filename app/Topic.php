<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'users_id' => 'required',
        'title' => 'required',
        'travel_destination' => 'required',
        'body' => 'required',
    );
}
