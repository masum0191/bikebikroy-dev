<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
       'slug','division','bndivision','country_id','id'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
    public function district()
    {
        return $this->hasMany('App\Models\District');
    }
    public function bikesale()
    {
        return $this->hasMany('App\Models\Bikesale');
    } 

}
