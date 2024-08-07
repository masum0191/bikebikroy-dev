<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Userphoneverify extends Model
{

 protected $fillable = ['user_id',
 'username','phonenumber','otp','expiredate','status' ];

}
