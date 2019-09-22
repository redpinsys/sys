<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/client/label-sticker', 'HomeController@getLabelstickerIndex');
Route::get('/client/inkjet-sticker', 'HomeController@getInkjetstickerIndex');
Route::post('/api/labelsticker/quotation', 'HomeController@getLabelstickerQuotationApi');
Route::post('/api/inkjetsticker/quotation', 'HomeController@getInkjetstickerQuotationApi');

Route::get('/api/materials/all', 'MaterialController@getAllMaterialsApi');
Route::get('/api/materials/product/{product_id}', 'MaterialController@getAllMaterialsByProductIdApi');

Route::get('/api/orderquantities/all', 'OrderquantityController@getAllOrderquantitiesApi');

Route::get('/api/shapes/all', 'ShapeController@getAllShapesApi');
Route::get('/api/shapes/product/{product_id}', 'ShapeController@getAllShapesByProductIdApi');

Route::get('/api/laminations/all', 'LaminationController@getAllLaminationsApi');
Route::get('/api/laminations/product/{product_id}', 'LaminationController@getAllLaminationsByProductIdApi');

Route::get('/api/finishings/all', 'FinishingController@getAllFinishingsApi');
Route::get('/api/finishings/product/{product_id}', 'FinishingController@getAllFinishingsByProductIdApi');

Route::get('/api/frames/all', 'FrameController@getAllFramesApi');
Route::get('/api/frames/product/{product_id}', 'FrameController@getAllFramesByProductIdApi');

Route::get('/api/deliveries/all', 'DeliveryController@getAllDeliveriesApi');
Route::get('/api/deliveries/product/{product_id}', 'DeliveryController@getAllDeliveriesByProductIdApi');
