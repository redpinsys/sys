<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantitymultiplier extends Model
{
    protected $fillable = [
        'multiplier', 'min', 'max', 'product_id'
    ];
}
