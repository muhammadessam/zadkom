<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
    public function orders(){
        return $this->belongsToMany(Order::class,'orders_products','order_id','product_id');
    }
}
