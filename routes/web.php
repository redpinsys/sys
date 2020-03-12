<?php

Auth::routes();


Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/price', 'PriceController@index')->name('price.index');
Route::get('/order', 'OrderController@index')->name('order.index');

Route::group(['prefix' => 'client'], function() {
    Route::get('/label-sticker', 'HomeController@getLabelstickerIndex');
    Route::get('/inkjet-sticker', 'HomeController@getInkjetstickerIndex');
});


Route::group(['prefix' => 'api'], function() {
    Route::group(['prefix' => 'materials'], function() {
        Route::get('/all', 'MaterialController@getAllMaterialsApi');
        Route::get('/product/{id}', 'MaterialController@getAllMaterialsByProductIdApi');
        Route::post('/{id}', 'MaterialController@updateProductMaterialByIdApi');
    });

    Route::group(['prefix' => 'shapes'], function() {
        Route::get('/all', 'ShapeController@getAllShapesApi');
        Route::get('/product/{product_id}', 'ShapeController@getAllShapesByProductIdApi');
        Route::post('/{id}', 'ShapeController@updateProductShapeByIdApi');
    });

    Route::group(['prefix' => 'laminations'], function() {
        Route::get('/all', 'LaminationController@getAllLaminationsApi');
        Route::get('/product/{product_id}', 'LaminationController@getAllLaminationsByProductIdApi');
    });

    Route::group(['prefix' => 'finishings'], function() {
        Route::get('/all', 'FinishingController@getAllFinishingsApi');
        Route::get('/product/{product_id}', 'FinishingController@getAllFinishingsByProductIdApi');
    });

    Route::group(['prefix' => 'frames'], function() {
        Route::get('/all', 'FrameController@getAllFramesApi');
        Route::get('/product/{product_id}', 'FrameController@getAllFramesByProductIdApi');
    });

    Route::group(['prefix' => 'deliveries'], function() {
        Route::get('/all', 'DeliveryController@getAllDeliveriesApi');
        Route::get('/product/{product_id}', 'DeliveryController@getAllDeliveriesByProductIdApi');
        Route::post('/{id}', 'DeliveryController@updateProductDeliveryByIdApi');
    });

    Route::group(['prefix' => 'orderquantities'], function() {
        Route::get('/all', 'OrderquantityController@getAllOrderquantitiesApi');
        Route::post('/{id}', 'OrderquantityController@updateOrderquantityByIdApi');
    });

    Route::post('/labelsticker/quotation', 'HomeController@getLabelstickerQuotationApi');
    Route::post('/inkjetsticker/quotation', 'HomeController@getInkjetstickerQuotationApi');

});