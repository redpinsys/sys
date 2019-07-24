<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderquantity;

class OrderquantityController extends Controller
{
    // retrieve all orderquantities list
    public function getAllOrderquantitiesApi()
    {
        $orderquantities = Orderquantity::orderBy('qty')->get();

        return $orderquantities;
    }
}
