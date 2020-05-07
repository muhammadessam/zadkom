<?php

namespace App;

use App\Models\DriverRatsCustomer;
use App\Models\Order;
use App\Models\CustomerRatsDriver;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Driver;
use App\Models\Store;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_pic', 'type', 'phone', 'is_active', 'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function driver()
    {
        return $this->hasOne(Driver::class, 'user_id', 'id');
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'user_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function nots()
    {
        return $this->hasMany('App\Models\Not', 'user_id', 'id');
    }

    public function ratesDriver()
    {
        return $this->hasMany(CustomerRatsDriver::class, 'customer_id', 'id');
    }

    public function ratedByDriver()
    {
        return $this->hasMany(DriverRatsCustomer::class, 'customer_id', 'id');
    }
}
