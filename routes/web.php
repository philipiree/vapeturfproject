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


Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('/dashboard', function () {
    return view('admin.dashboard');
    });

    //registered users & role assignments
    Route::get('/role-register', 'Admin\DashboardController@registered');
    Route::get('/role-edit/{id}','Admin\DashboardController@edit');
    Route::put('/role-register-update/{id}','Admin\DashboardController@update');
    Route::delete('/role-delete/{id}','Admin\DashboardController@delete');
    //product routes resources


    Route::get('/listedproducts', 'ProductsController@index');
    //product routes resources
    Route::get('/create-product','ProductsController@create');
    Route::get('/edit-product/{id}','ProductsController@edit');
    Route::delete('/delete-product/{id}','ProductsController@destroy');
    Route::resource('product', 'ProductsController');
    Route::get('/listedproducts/{id}', 'ProductsController@show');

    //categories routes
    Route::resource('category', 'CategoryController');
    /*examples*/

    //Route::resource('category', 'CategoryController', ['except' => ['create']]);
    //Route::resource('category', 'CategoryController', ['only' => ['create', 'index']]);



});

    //Route::get('/listedproducts/{id}', 'ProductsController@show');

    //route for products display
    Route::get('/collections', 'ProductsController@viewer');
    Route::get('/collections/categories/{category}', 'CategoriesController@index');
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
