<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Procategory extends Model

{
    use SoftDeletes; 
    protected $fillable =['admin_id','title','slug','language','keyword','headerscript','metadescription','schemascript','metatitle','headerinfo','queryinfo','footerinfo','status','clickview','image','shortdescription','bikename'];

    public function admin(){
        return $this->belongsTo('App\Admin','admin_id','id');
    }
   
}
