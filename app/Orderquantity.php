<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderquantity extends Model
{
    protected $fillable = [
        'name', 'multiplier', 'qty'
    ];
}
