<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Chatlist extends Model
{
    protected $fillable=[
        'user_id','chatuser_id','message','imagename','status'
    ];
}
