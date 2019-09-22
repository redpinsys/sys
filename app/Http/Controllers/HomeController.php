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
        $material = Productmaterial::where('material_id', $material_id)->where('product_id', $product_id)->first();
        $shape = Productshape::where('shape_id', $shape_id)->where('product_id', $product_id)->first();
        $delivery = Productdelivery::where('delivery_id', $delivery_id)->where('product_id', $product_id)->first();
        // dd($floor_width, $floor_height, $area);

        $formula = intval(round($orderquantity->qty/ $area) + 3);

        $quantitymultipler = Quantitymultiplier::where('min', '<=', $formula)
            ->where('max', '>=', $formula)
            ->where('product_id', $product_id)
            ->first();

        $total = ($formula * $quantitymultipler->multiplier * $material->multiplier * $shape->multiplier) + $delivery->multiplier + 15;
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
        $this->validate(request(), [
            'width' => 'lte:150',
            'height' => 'lte:500'
        ]);

        $cal_width = $width * 0.035;
        $cal_height = $height * 0.035;

        $area = round($cal_width * $cal_height, 2);

        $material = Productmaterial::where('material_id', $material_id)->where('product_id', $product_id)->first();
        $shape = Productshape::where('shape_id', $shape_id)->where('product_id', $product_id)->first();
        $lamination = Productlamination::where('lamination_id', $lamination_id)->where('product_id', $product_id)->first();
        $finishing = Productfinishing::where('finishing_id', $finishing_id)->where('product_id', $product_id)->first();
        $orderquantity = Orderquantity::findOrFail($orderquantity_id);
        $delivery = Productdelivery::where('delivery_id', $delivery_id)->where('product_id', $product_id)->first();

        $total = $shape ? $shape->multiplier : 0 * ($material ? $material->multiplier : 0 + $lamination ? $lamination->multiplier : 0 + $finishing ? $finishing->multiplier : 0) * $area;

        $total = $total * $orderquantity->qty;

        // dd($delivery);
        $total = $total + ($delivery ? $delivery->multiplier : 0);

        return $total;

    }
}
