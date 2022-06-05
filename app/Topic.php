<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;
    
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required|max:50',
        'travel_destination' => 'required',
        'body' => 'required|max:500',
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function favorite()
    {
        return $this->hasMany('App\Favorite');
    }
    
    public function tag()
    {
        return $this->belongsToMany('App\Tag'); 
    }
}
