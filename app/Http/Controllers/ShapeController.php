<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shape;

class ShapeController extends Controller
{
    // retrieve all shapes list
    public function getAllShapesApi()
    {
        $shapes = Shape::orderBy('name')->get();

        return $shapes;
    }
}
