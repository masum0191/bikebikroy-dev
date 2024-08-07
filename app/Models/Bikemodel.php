<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bikemodel extends Model
{
    use HasFactory;
    public function bikebrand()
    {
        return $this->belongsTo('App\Models\Bikebrand');
    }
}
