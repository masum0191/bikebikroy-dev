<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bikesalechat extends Model
{
    protected $fillable=[
        'user_id','bikesale_id','bikesaler_id','name','users'
    ];
    protected $casts = [
        // 'users' => 'array',
    ];
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
    public function bikesalechatdetails()
    {
        return $this->hasMany('App\Models\Bikesalechatdetails');
    }
}
