<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;
use DB;

class DeliveryController extends Controller
{
    // retrieve all deliveries list
    public function getAllDeliveriesApi()
    {
        $deliveries = Delivery::orderBy('name')->get();

        return $deliveries;
    }

    // retrieve all deliveries by product id list
    public function getAllDeliveriesByProductIdApi($product_id)
    {
        $deliveries = DB::table('productdeliveries')
            ->leftJoin('products', 'products.id', '=', 'productdeliveries.product_id')
            ->leftJoin('deliveries', 'deliveries.id', '=', 'productdeliveries.delivery_id')
            ->orderBy('deliveries.name')
            ->where('products.id', $product_id)
            ->select(
                'deliveries.id', 'deliveries.name', 'productdeliveries.multiplier'
            )
            ->get();

        return $deliveries;
    }
}
