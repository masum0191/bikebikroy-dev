<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bikesale extends Model
{
  protected $fillable=['title','slug','user_id','admin_id','price','negotiable','slider','topadd','urgentsale','biketype','bikebrand_id','bikemodel_id','admin_id','manager_id','division_id','district_id','thana_id','area_id','condition','edition','year','kilometerrun','manufacture','cc','description','photoone','phototwo','photothree','photofour','photofive','phonenumber','expiredate','topaddexpire','bumpaddexpire','metatitle','urgentexpire','spotlightexpire','view','admincomment','managercomment','metadescription','screma','keyword','managersatus','status','path'];

	protected $casts = [
		'created_at' => 'datetime:M d Y',
        // 'phonenumber' => 'array'
	];
	public function bikebrand()
    {
        return $this->belongsTo('App\Models\Bikebrand');
    }
    public function bikemodel()
    {
        return $this->belongsTo('App\Models\Bikemodel');
    }
    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }
    public function thana()
    {
        return $this->belongsTo('App\Models\Thana');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}