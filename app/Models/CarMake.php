<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    protected $table = 'make';

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function carModels()
    {
        return $this->hasMany(CarModel::class, 'make_id', 'id');
    }
}
