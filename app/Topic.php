<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'travel_destination' => 'required',
        'body' => 'required',
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function favorite()
    {
        return $this->hasMany('App\Favorite');
    }
}
