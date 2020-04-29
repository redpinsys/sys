<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quantitymultiplier;

class QuantitymultiplierController extends Controller
{
    // retrieve all quantitymultipliers list
    public function getAllQuantitymultipliersApi()
    {
        $model = Quantitymultiplier::orderBy('min', 'max')->get();

        return $model;
    }

    // retrieve all deliveries by product id list
    public function getAllQuantitymultipliersByProductIdApi($product_id)
    {
        $model = Quantitymultiplier::leftJoin('products', 'products.id', '=', 'quantitymultipliers.product_id')
            ->where('products.id', $product_id)
            ->select(
                'quantitymultipliers.id', 'quantitymultipliers.min', 'quantitymultipliers.max', 'quantitymultipliers.multiplier'
            )
            ->orderBy('quantitymultipliers.min')
            ->get();

        return $model;
    }

    // update quantitymultiplier by given id
    public function updateQuantitymultiplierByIdApi($id)
    {
        $min = request('min');
        $max = request('max');
        $multiplier = request('multiplier');

        $model = Quantitymultiplier::findOrFail($id);
        if($min) {
            $model->min = $min;
        }
        if($max) {
            $model->max = $max;
        }
        if($multiplier) {
            $model->multiplier = $multiplier;
        }

        $model->save();
    }
}
