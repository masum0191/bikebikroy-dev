<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Package extends Model
{

    protected $fillable=[
        'superadmin_id',
        'packagename',
        'packageprice',
        'expiryday',
        'description',
         'status',
    ];


    public function customer()
    {
        return $this->hasOne('App\Models\Customer');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
