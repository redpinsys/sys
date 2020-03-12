<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lamination;
use App\Productlamination;
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
            ->where('products.id', $product_id)
            ->select(
                'productlaminations.id', 'laminations.name', 'productlaminations.multiplier'
            )
            ->get();

        return $laminations;
    }

    // update product lamination by given id
    public function updateProductLaminationByIdApi($id)
    {
        $model = Productlamination::findOrFail($id);
        $multiplier = request('multiplier');

        $model->multiplier = $multiplier;
        $model->save();
    }
}
