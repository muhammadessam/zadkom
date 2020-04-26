<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }
}
