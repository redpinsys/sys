<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productlamination extends Model
{
    protected $fillable = [
        'product_id', 'lamination_id', 'multiplier'
    ];
}
