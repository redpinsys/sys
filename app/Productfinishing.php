<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productfinishing extends Model
{
    protected $fillable = [
        'product_id', 'finishing_id', 'multiplier'
    ];
}
