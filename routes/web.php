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

// Capital Routes
Route::resource('capital','CapitalController');

// Asset Routes
Route::resource('asset','AssetController');

// Supplier Routes
Route::resource('supplier','SupplierController');

// Account Routes
Route::resource('account','AccountController');

// Purchasing Routes
Route::resource('purchasing','PurchasingController');

// Selling Routes
Route::resource('selling','SellingController');

// Inventory Routes
Route::resource('inventory','InventoryController');

// Product Routes
Route::resource('product','ProductController');

// Journal Routes
Route::resource('journal','JournalController');