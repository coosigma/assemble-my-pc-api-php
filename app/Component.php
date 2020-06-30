<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = [
        "cache_m", "cores", "threads", "speed_g", "price", "name", "category", "manufacturer", "supplier",
    ];
}
