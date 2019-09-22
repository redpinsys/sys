<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lamination;
use DB;

class LaminationController extends Controller
{
    // retrieve all laminations list
    public function getAllLaminationsApi()
    {
        $laminations = Lamination::orderBy('name')->get();

        return $laminations;
    }

    // retrieve all laminations by product id list
    public function getAllLaminationsByProductIdApi($product_id)
    {
        $laminations = DB::table('productlaminations')
            ->leftJoin('products', 'products.id', '=', 'productlaminations.product_id')
            ->leftJoin('laminations', 'laminations.id', '=', 'productlaminations.lamination_id')
            ->orderBy('laminations.name')
            ->where('products.id', $product_id)
            ->select(
                'laminations.id', 'laminations.name', 'productlaminations.multiplier'
            )
            ->get();

        return $laminations;
    }
}
