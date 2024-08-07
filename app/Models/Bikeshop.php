<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bikeshop extends Model
{
    protected $fillable=[
        'admin_id','user_id','shopname','slug','shopemail','facebookshoplink','address','coverphoto','profilephoto','contactnumber','googleamplocaltion','description','shopexpiredate','view','status','path'
    ];
 
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    protected $casts = [
		'created_at' => 'datetime:M d Y',
	];
}
