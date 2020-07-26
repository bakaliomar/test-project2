<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    protected $fillable = [
        'delivery_at'
    ];
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
