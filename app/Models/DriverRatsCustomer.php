<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DriverRatsCustomer extends Model
{
    protected $table = 'driver_rats_customers';
    protected $fillable = ['customer_id', 'driver_id', 'value'];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
