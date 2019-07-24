<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderquantity;
use App\Material;
use App\Quantitymultiplier;
use App\Shape;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLabelstickerIndex', 'getLabelstickerQuotationApi']]);
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

    // return label sticker api()
    public function getLabelstickerQuotationApi()
    {

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
        $dimension = [
            'width' => 0,
            'height' => 0
        ];
        $floor_width = 0;
        $floor_height = 0;
        $area = 0;
        $formula = 0;
        $total = 0;

        // dd(request()->all());
        if($material_id == 5) {
            $dimension = [
                'width' => 282,
                'height' => 434
            ];
            $this->validate(request(), [
                'width' => 'lte:282',
                'height' => 'lte:434'
            ]);
        }else {
            $dimension = [
                'width' => 307,
                'height' => 460
            ];
            $this->validate(request(), [
                'width' => 'lte:307',
                'height' => 'lte:460'
            ]);
        }

        $floor_width = floor($dimension['width']/ $width);
        $floor_height = floor($dimension['height']/ $height);

        $area = $floor_width * $floor_height;

        $orderquantity = Orderquantity::findOrFail($orderquantity_id);
        $material = Material::findOrFail($material_id);
        $shape = Shape::findOrFail($shape_id);
        // dd($floor_width, $floor_height, $area);

        $formula = intval(round($orderquantity->qty/ $area) + 3);

        $quantitymultipler = Quantitymultiplier::where('min', '<=', $formula)->where('max', '>=', $formula)->first();

        $total = ($formula * $quantitymultipler->multiplier * $material->multiplier * $shape->multiplier) + $delivery_fee + 15;
        // dd($formula, $quantitymultipler->multiplier, $material->multiplier, $shape->multiplier, $total);

        return $total;

    }
}
