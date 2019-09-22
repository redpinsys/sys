<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finishing;
use DB;

class FinishingController extends Controller
{
    // retrieve all finishings list
    public function getAllFinishingsApi()
    {
        $finishings = Finishing::orderBy('name')->get();

        return $finishings;
    }

    // retrieve all finishings by product id list
    public function getAllFinishingsByProductIdApi($product_id)
    {
        $finishings = DB::table('productfinishings')
            ->leftJoin('products', 'products.id', '=', 'productfinishings.product_id')
            ->leftJoin('finishings', 'finishings.id', '=', 'productfinishings.finishing_id')
            ->orderBy('finishings.name')
            ->where('products.id', $product_id)
            ->select(
                'finishings.id', 'finishings.name', 'productfinishings.multiplier'
            )
            ->get();

        return $finishings;
    }
}
