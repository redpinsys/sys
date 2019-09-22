<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\Productmaterial;
use DB;

class MaterialController extends Controller
{
    // retrieve all materials list
    public function getAllMaterialsApi()
    {
        $materials = Material::orderBy('name')->get();

        return $materials;
    }

    // retrieve all materials by product id list
    public function getAllMaterialsByProductIdApi($product_id)
    {
        $materials = DB::table('productmaterials')
            ->leftJoin('products', 'products.id', '=', 'productmaterials.product_id')
            ->leftJoin('materials', 'materials.id', '=', 'productmaterials.material_id')
            ->orderBy('materials.name')
            ->where('products.id', $product_id)
            ->select(
                'materials.id', 'materials.name', 'productmaterials.multiplier'
            )
            ->get();

        return $materials;
    }
}
