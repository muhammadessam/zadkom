<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $with = ['car', 'user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function car()
    {
        return $this->hasOne(Car::class, 'driver_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'driver_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'driver_id', 'id');
    }
}
