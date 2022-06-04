<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    
    protected $guarded = array('id');

    public static $rules = array(
        'nickname' => 'required|max:20',
        'favorite_travel_destination' => 'required|max:50',
        'self_introduction' => 'required|max:10000',
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
