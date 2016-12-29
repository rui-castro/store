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

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmailToAdmin');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get(
    '/',
    function () {
        return redirect()->route('products.index');
    }
)->name('root');

Route::resource(
    'products',
    'ProductController',
    ['only' => ['index', 'show']]
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
    ['only' => ['create', 'store']]
);

Route::get(
    'orders/confirmation',
    'OrderController@confirmation'
)->name('orders.confirmation');

// Admin area

Route::get('admin', function () {
    return redirect('/admin/orders');
})->name('admin');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::resource(
        'products',
        'ProductController',
        ['except' => ['show']]
    );
    Route::resource(
        'products.variants',
        'ProductVariantController',
        ['only' => ['create', 'destroy']]
    );
    Route::resource(
        'variants',
        'ProductVariantController',
        ['only' => ['store', 'edit', 'update']]
    );
    Route::resource(
        'orders',
        'OrderController',
        ['only' => ['index', 'show']]
    );
    Route::resource(
        'options',
        'OptionController',
        ['except' => ['show']]
    );
    Route::resource(
        'options.option_values',
        'OptionValueController',
        ['only' => ['create', 'store', 'edit', 'update', 'destroy']]
    );
});
