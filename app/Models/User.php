<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends  Authenticatable 
{
    use Notifiable;
    use SoftDeletes;


        protected $dates = ['deleted_at'];

		//   protected $guard_name = 'admin';
        protected $fillable = ['admin_id',
            'username','phone','email','photo','remember_token','status','password','otp','fullname','accounttpe','membertype','salertype','package_id','birthdate','division_id','district_id','thana_id','area_id','shop','shoptitle','shopdescripiton','googleloaction','saturday','sunday','monday','tuesday','wednesday','thuresday','friday','profilephoto','coverphoto','shopexpirydate','path','email_verified_at','salepost' ];

        protected $hidden = [
            'password', 'remember_token',
        ];
        public function gender(){
            return $this->belongsTo('App\Gender');
        }
         public function admin(){
            return $this->belongsTo('App\Models\Admin','admin_id','id');
        }
        public function bikeshop()
        {
            return $this->hasOne('App\Models\Bikeshop');
        }


        public function status(){
            return $this->belongsTo('App\Models\Status');
        }

        public function accounttype()
        {
            return $this->belongsTo('App\Models\Accounttype');
        }

        public function userreview(){
            return $this->hasOne('App\Models\Userreview');
            }
               public function todotaskuser(){
            return $this->hasOne('App\Models\Todotaskuser');
            }

             public function bikesale(){
            return $this->hasMany('App\Models\Bikesale');
            }
            public function package(){
                return $this->belongsTo('App\Models\Package');
            }
            public function chat(){
                return $this->hasMany('App\Models\Chat');
                }
                 public function chatuserid(){
                return $this->hasMany('App\Models\Chat');
                }
        protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:M d Y',
    ];

    public function bikesalechat(){
        return $this->hasMany('App\Models\Bikesalechat');

        }

}