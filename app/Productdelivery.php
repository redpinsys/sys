<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productdelivery extends Model
{
    protected $fillable = [
        'product_id', 'delivery_id', 'multiplier'
    ];
}
