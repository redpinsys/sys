<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderquantity;
use App\Material;
use App\Quantitymultiplier;
use App\Shape;

use App\Productmaterial;
use App\Productshape;
use App\Productlamination;
use App\Productfinishing;
use App\Productframe;
use App\Productdelivery;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLabelstickerIndex', 'getLabelstickerQuotationApi', 'getInkjetstickerIndex', 'getInkjetstickerQuotationApi']]);
        Auth::loginUsingId(1, true);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // return label sticker index
    public function getLabelstickerIndex()
    {
        return view('client.labelsticker');
    }

    // return sticker index
    public function getStickerIndex()
    {
        return view('client.sticker.label');
    }

    // return label sticker api()
    public function getLabelstickerQuotationApi()
    {
        $product_id = 1;

        $this->validate(request(), [
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'material_id' => 'required',
            'orderquantity_id' => 'required',
            'shape_id' => 'required',
        ], [
            'material_id.required' => 'Please select a material',
            'orderquantity_id.required' => 'Please select the quantities',
            'shape_id.required' => 'Please select the shape'
        ]);

        $width = request('width');
        $height = request('height');
        $material_id = request('material_id');
        $orderquantity_id = request('orderquantity_id');
        $shape_id = request('shape_id');
        $delivery_fee = request('delivery_fee');
        $delivery_id = request('delivery_id');
        $dimension = [
            'width' => 0,
            'height' => 0
        ];
        $floor_width = 0;
        $floor_height = 0;
        $area = 0;
        $formula = 0;
        $total = 0;

        $dimension = [
            'width' => 305,
            'height' => 455
        ];
        $this->validate(request(), [
            'width' => 'lte:305',
            'height' => 'lte:455'
        ]);

        $floor_width1 = floor(($dimension['width'] + 3) / $width);
        $floor_height1 = floor(($dimension['height'] + 3)/ $height);

        $floor_width2 = floor(($dimension['width'] + 3)/ $height);
        $floor_height2 = floor(($dimension['height'] + 3)/ $width);

        $area1 = $floor_width1 * $floor_height1;
        $area2 = $floor_width2 * $floor_height2;

        if($area1 > $area2){
            $area = $area1;
        }else {
            $area = $area2;
        }

        $orderquantity = Orderquantity::findOrFail($orderquantity_id);
        $material = Productmaterial::find($material_id);
        $shape = Productshape::find($shape_id);
        $delivery = Productdelivery::find($delivery_id);

        $formula = intval(round($orderquantity->qty/ $area) + 1);

        $quantitymultiplier = Quantitymultiplier::where('min', '<=', $formula)
            ->where('max', '>=', $formula)
            ->where('product_id', $product_id)
            ->first();

        $total = ($formula * $quantitymultiplier->multiplier * $material->multiplier * $shape->multiplier) + $delivery->multiplier;
        // dd($formula, $quantitymultipler->multiplier, $material->multiplier, $shape->multiplier, $total);

        return $total;
    }

    // return inkjet sticker index
    public function getInkjetstickerIndex()
    {
        return view('client.inkjetsticker');
    }

    // return inkjet sticker api()
    public function getInkjetstickerQuotationApi()
    {
        $product_id = 2;

        $this->validate(request(), [
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'material_id' => 'required',
            // 'orderquantity_id' => 'required',
            'shape_id' => 'required',
        ], [
            'material_id.required' => 'Please select a material',
            // 'orderquantity_id.required' => 'Please select the quantities',
            'shape_id.required' => 'Please select the shape'
        ]);

        $width = request('width');
        $height = request('height');
        $material_id = request('material_id');
        $orderquantity_id = request('orderquantity_id');
        $quantities = request('quantities');
        $shape_id = request('shape_id');
        $lamination_id = request('lamination_id');
        $finishing_id = request('finishing_id');
        $frame_id = request('frame_id');
        $delivery_id = request('delivery_id');
        $dimension = [
            'width' => 0,
            'height' => 0
        ];
        $cal_width = 0;
        $cal_height = 0;
        $area = 0;
        $formula = 0;
        $total = 0;

        $dimension = [
            'width' => 150,
            'height' => 500
        ];
/*
        $this->validate(request(), [
            'width' => 'lte:150',
            'height' => 'lte:500'
        ]); */

        $cal_width = $width * 0.035;
        $cal_height = $height * 0.035;

        $area = round($cal_width * $cal_height, 2);
/*
        $material = Productmaterial::where('material_id', $material_id->id)->where('product_id', $product_id)->first();
        $shape = Productshape::where('shape_id', $shape_id->id)->where('product_id', $product_id)->first();
        $lamination = Productlamination::where('lamination_id', $lamination_id->id)->where('product_id', $product_id)->first();
        $finishing = Productfinishing::where('finishing_id', $finishing_id->id)->where('product_id', $product_id)->first();
        $delivery = Productdelivery::where('delivery_id', $delivery_id->id)->where('product_id', $product_id)->first(); */
        // dd(request()->all());

        // $total = $shape->multiplier : 0 * ($material ? $material->multiplier : 0 + $lamination ? $lamination->multiplier : 0 + $finishing ? $finishing->multiplier : 0) * $area;

        $total = $shape->multiplier * ($material->multiplier + $lamination->multiplier + $finishing->multiplier);

        // $total = $total * $orderquantity->qty;
        $total = $total * $quantities;

        // dd($delivery);
        $total = $total + ($delivery ? $delivery->multiplier : 0);

        // dd($total);

        return $total;

    }
}
