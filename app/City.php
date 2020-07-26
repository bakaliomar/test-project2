<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name'
    ];
    public function deliveryTimes(){
        $this->hasMany('App\DeliveryTime');
    }
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
}
