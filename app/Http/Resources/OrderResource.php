<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        =>  $this->id,
            'user'      =>  $this->user,
            'store_id'  =>  $this->store_id,
            'driver_id' =>  $this->driver_id,
            'status'    =>  $this->status,
            'fees'      =>  $this->fees,
            'products'  =>  $this->products,
        ];
    }
}
