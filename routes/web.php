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

Route::get('/', 'TopController@index')->name('top');

// ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::middleware('guest')->group(function () {
    // 出品者登録
    Route::prefix('exhibitor')->group(function () {
        Route::get('signup/{auth_code}', 'UsersController@signupExhibitor')->name('exhibitor.signup');
        Route::post('register', 'UsersController@postExhibitor')->name('exhibitor.post');
    });

    // 出品者申請登録
    Route::prefix('applicant')->group(function () {
        Route::get('/', 'UsersController@signupApplicant')->name('applicant.signup');
        Route::post('/', 'UsersController@applyExhibitor')->name('applicant.apply');
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductsController@index')->name('product.index');
        Route::get('{id}', 'ProductsController@show')->name('product.show');
    });

    Route::prefix('cart')->group(function () {
        Route::get('/', 'CartController@index')->name('cart.index');
        Route::post('add/{product}', 'CartController@add')->name('cart.add');
        Route::delete('/', 'CartController@delete')->name('cart.destroy');
    });

    Route::prefix('order')->group(function () {
        Route::post('/', 'OrdersController@store')->name('order.store');
        Route::get('/orderHistory/{all}', 'OrdersController@index')->name('order.all');
        Route::get('/{id}', 'OrdersController@details')->name('order.details');
        Route::delete('/{id}', 'OrdersController@destroy')->name('order.destroy');
    });

    Route::get('users/{id}', 'UsersController@show')->name('user.show');
    Route::get('edit/{id}', 'UsersController@getEdit')->name('user.edit');
    Route::put('update/{id}', 'UsersController@postEdit')->name('user.postEdit');
    Route::delete('destroy/{id}', 'UsersController@destroy')->name('user.destroy');
});
