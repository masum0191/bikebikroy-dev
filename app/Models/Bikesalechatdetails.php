<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Bikesalechatdetails extends Model
{
    protected $fillable=[
        'user_id','bikesalechat_id','message','replymessage','messageby','bikesaleuserseen','userseen'
    ];
    public function Bikesalechat()
    {
        return $this->belongsTo('App\Models\Bikesalechat');
    }
}
