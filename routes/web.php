<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get(
    '/',
    function () {
        return redirect()->route('products.index');
    }
)->name('root');

Route::resource(
    'products',
    'ProductController',
    ['only' => ['index', 'show', 'create', 'store']]
);

Route::get(
    'bags',
    'BagController@show'
)->name('bags.show');

Route::resource(
    'bag_items',
    'BagItemController',
    ['only' => ['store', 'update', 'destroy']]
);

Route::resource(
    'orders',
    'OrderController',
    ['only' => ['create', 'store', 'show']]
);
