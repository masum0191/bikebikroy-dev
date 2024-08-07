<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bikebrand extends Model
{
    use HasFactory;
    public function bikemodel()
    {
        return $this->hasMany('App\Models\Bikemodel');
    }
    public function bikesale()
    {
        return $this->hasMany('App\Models\Bikesale');
    } 
}