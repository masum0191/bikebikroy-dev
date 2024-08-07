<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable=[
        'chatuser_id','user_id','message','created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
     public function chatuserid()
    {
        return $this->belongsTo('App\Models\User');
    }
}
