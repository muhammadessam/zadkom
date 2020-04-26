<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
        return $this->belongsToMany('App\Http\Models\Product','orders_products','product_id','order_id');
    }
    public  function user(){
        return $this->belongsTo('App\Http\User','user_id','id');
    }
}
