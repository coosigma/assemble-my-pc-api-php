<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = [
        "cache_m", "cores", "threads", "speed_g", "price", "name", "category", "manufacturer", "supplier",
    ];

    public static function esToComponent($esArray): Object
    {
        $s = $esArray['_source'];
        return (object) [
            'id' => $esArray['_id'],
            'name' => $s['name'],
            'price' => $s['price'],
            'type' => $s['type'],
            'manufacturer' => $s['manufacturer'],
            'GPUIntegrated' => $s['GPUIntegrated']
        ];
    }
}
