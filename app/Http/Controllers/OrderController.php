<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // middleware auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    // return index page
    public function index()
    {
        return view('order.index');
    }
}
