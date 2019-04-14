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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Capital Routes
Route::resource('capital','CapitalController');

// Asset Routes
Route::resource('asset','AssetController');

// Supplier Routes
Route::resource('supplier','SupplierController');

// Account Routes
Route::resource('account','AccountController');
Route::get('getAccount', 'AccountController@getAccountList');
Route::get('getAccountGroup', 'AccountController@getAccountGroup');
Route::get('getAccountDetail/{id}', 'AccountController@getAccountDetail');

// Purchasing Routes
Route::resource('purchasing','PurchasingController');

// Selling Routes
Route::resource('selling','SellingController');

// Inventory Routes
Route::resource('inventory','InventoryController');

// Product Routes
Route::resource('product','ProductController');
Route::get('getProduct', 'ProductController@getProductList');

// Journal Routes
Route::resource('journal','JournalController');