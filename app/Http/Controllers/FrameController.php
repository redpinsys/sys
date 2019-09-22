<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Frame;
use DB;

class FrameController extends Controller
{
    // retrieve all frames list
    public function getAllFramesApi()
    {
        $frames = Frame::orderBy('name')->get();

        return $frames;
    }


    // retrieve all frames by product id list
    public function getAllFramesByProductIdApi($product_id)
    {
        $frames = DB::table('productframes')
            ->leftJoin('products', 'products.id', '=', 'productframes.product_id')
            ->leftJoin('frames', 'frames.id', '=', 'productframes.frame_id')
            ->orderBy('frames.name')
            ->where('products.id', $product_id)
            ->select(
                'frames.id', 'frames.name', 'productframes.multiplier'
            )
            ->get();
            // dd($frames);

        return $frames;
    }
}
