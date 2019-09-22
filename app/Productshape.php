<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productshape extends Model
{
    protected $fillable = [
        'product_id', 'shape_id', 'multiplier'
    ];
}
