<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $guarded = [];

    public function price(){
        return $this->belongsTo(Price::class);
    }
    public function activity(){
        return $this->belongsTo(Activity::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }


}
