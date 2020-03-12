<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productshape;
use App\Shape;
use DB;

class ShapeController extends Controller
{
    // retrieve all shapes list
    public function getAllShapesApi()
    {
        $shapes = Shape::orderBy('name')->get();

        return $shapes;
    }

    // retrieve all shapes by product id list
    public function getAllShapesByProductIdApi($product_id)
    {
        $shapes = DB::table('productshapes')
            ->leftJoin('products', 'products.id', '=', 'productshapes.product_id')
            ->leftJoin('shapes', 'shapes.id', '=', 'productshapes.shape_id')
            ->where('products.id', $product_id)
            ->select(
                'productshapes.id', 'shapes.name', 'productshapes.multiplier'
            )
            ->get();

        return $shapes;
    }

    // update product shape by given id
    public function updateProductShapeByIdApi($id)
    {
        $model = Productshape::findOrFail($id);
        $multiplier = request('multiplier');

        $model->multiplier = $multiplier;
        $model->save();
    }
}
