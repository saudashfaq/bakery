<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\PagesController@index');

// closure  function


Route::get('/about', 'App\Http\Controllers\PagesController@about');

Route::get('/services', 'App\Http\Controllers\PagesController@services');

//resource....
Route::resource('products', 'App\Http\Controllers\ProductsController');

//resource stocks
//        Route::resource('/stock' , 'App\Http\Controllers\StockController');
//resource project for
Route::resource('/stocks', 'App\Http\Controllers\StocksController');
//route for update price update
Route::get('/add-stock-page/{id}', 'App\Http\Controllers\PriceUpdateRM@addPricePage')->name('stock-add-page');
Route::put('/edit-stock/{id}/', 'App\Http\Controllers\PriceUpdateRM@updatePrice')->name('edit-stock');
// route for show raw material history
//Route::get('/history', 'App\Http\Controllers\HistoryController@showHistory');
Route::get('/history', 'App\Http\Controllers\HistoryController@showHistory');
Route::get('/historybyid{id}', 'App\Http\Controllers\HistoryController@showHistoryById')->name('history.byid');;

//route for product create.....
Route::get('/showproduct', 'App\Http\Controllers\ProductionController@index')->name('show.products');

Route::get('/createproduct', 'App\Http\Controllers\ProductionController@createProduct');
Route::post('/storeProduct', 'App\Http\Controllers\ProductionController@storeProduct')->name('storeProduct.product');
//Route::post('/storeProduct', 'App\Http\Controllers\ProductionController@storeProducted')->name('storeProduct.product');
Route::get('/showrecipe/{id}', 'App\Http\Controllers\ProductionController@show')->name('show.recipe');
Route::get('/shows/{id}', 'App\Http\Controllers\ProductionController@show')->name('shows');
Route::get('/productedit/{id}', 'App\Http\Controllers\ProductionController@editProduct')->name('product.edit');
Route::put('/productupdate/{id}', 'App\Http\Controllers\ProductionController@updateProduct')->name('product.update');
Route::delete('/productdelete/{id}', 'App\Http\Controllers\ProductionController@deleteProduct')->name('product.destroy');
//Route::get('/productcreateRecipe/{id}', 'App\Http\Controllers\ProductionController@productCreateRecipe')->name('product.createRecipe');//del
//Route::post('/productsaveRecipe/{id}', 'App\Http\Controllers\ProductionController@productSaveRecipe')->name('product.saveRecipe');//del
/*rout for inventory*/
Route::get('produceproduct/{id}', 'App\Http\Controllers\ProductionController@produce')->name('produce.product');
Route::post('/storeProducedProduct/{id}', 'App\Http\Controllers\ProductionController@storeProducedProduct')->name('storeProduced.Product');
Route::get('showinventory', 'App\Http\Controllers\ProductionController@showInventory')->name('inventory');

Auth::routes();
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
