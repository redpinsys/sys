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
Route::post('/api/labelsticker/quotation', 'HomeController@getLabelstickerQuotationApi');

Route::get('/api/materials/all', 'MaterialController@getAllMaterialsApi');

Route::get('/api/orderquantities/all', 'OrderquantityController@getAllOrderquantitiesApi');

Route::get('/api/shapes/all', 'ShapeController@getAllShapesApi');
