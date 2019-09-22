<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productmaterial extends Model
{
    protected $fillable = [
        'product_id', 'material_id', 'multiplier'
    ];
}
