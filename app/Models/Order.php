<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products', 'product_id', 'order_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'order_id', 'id');
    }
}
