<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaysOff extends Model
{
    protected $fillable = [
        'date',
        'span'
    ];
}
