<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    
    protected $guarded = array('id');

    public static $rules = array(
        'nickname' => 'required',
        'favorite_travel_destination' => 'required',
        'self_introduction' => 'required',
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
