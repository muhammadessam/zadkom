<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=['is_closed','allow_drivers','allow_stores','contact','kilo','close_msg'];
}
