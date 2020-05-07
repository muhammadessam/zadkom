<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function carMake(){
        return $this->belongsTo(CarMake::class, 'make_id', 'id');
    }

    public function CarModel(){
        return $this->belongsTo(CarModel::class, 'model_id', 'id');
    }
}
