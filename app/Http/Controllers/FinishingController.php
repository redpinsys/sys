<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finishing;
use App\Productfinishing;
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
            ->where('products.id', $product_id)
            ->select(
                'productfinishings.id', 'finishings.name', 'productfinishings.multiplier'
            )
            ->get();

        return $finishings;
    }

    // update product finishing by given id
    public function updateProductFinishingByIdApi($id)
    {
        $model = Productfinishing::findOrFail($id);
        $multiplier = request('multiplier');

        $model->multiplier = $multiplier;
        $model->save();
    }
}
