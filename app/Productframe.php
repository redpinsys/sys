<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productframe extends Model
{
    protected $fillable = [
        'product_id', 'frame_id', 'multiplier'
    ];
}
