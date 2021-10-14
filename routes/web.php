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
Route::get('/update' , function (){
    return view('stocks.updatequantity');
});


        Route::get('/' , 'App\Http\Controllers\PagesController@index');

        // closure  function


        Route::get('/about' , 'App\Http\Controllers\PagesController@about');

        Route::get('/services' , 'App\Http\Controllers\PagesController@services');

        //resource....
        Route::resource('products' , 'App\Http\Controllers\ProductsController');

        //resource stocks
//        Route::resource('/stock' , 'App\Http\Controllers\StockController');
        //resource project for
        Route::resource('/stocks' , 'App\Http\Controllers\StocksController');
        //route for update price update
        Route::get('/add-stock-page/{id}' , 'App\Http\Controllers\PriceUpdateRM@addPricePage')->name('stock-add-page');
        Route::put('/edit-stock/{id}/' , 'App\Http\Controllers\PriceUpdateRM@updatePrice')->name('edit-stock');
        // route for show raw material history
        Route::get('/history' ,'App\Http\Controllers\HistoryController@showHistory' );
        Route::get('/history' ,'App\Http\Controllers\HistoryController@showHistory' );

        //route for product create.....
        Route::get('/showproduct' ,'App\Http\Controllers\ProductionController@index')->name('show.products');
        Route::get('/createproduct' ,'App\Http\Controllers\ProductionController@createProduct');
        Route::post('/storeProduct' ,'App\Http\Controllers\ProductionController@storeProduct')->name('storeProduct.product');
        Route::get('/showrecipe/{id}' ,'App\Http\Controllers\ProductionController@show')->name('show.recipe');
        /*rout for inventory*/
        Route::get('produceproduct/{id}' ,'App\Http\Controllers\ProductionController@produce' )->name('produce.product');
        Route::post('/storeProducedProduct/{id}' ,'App\Http\Controllers\ProductionController@storeProducedProduct')->name('storeProduced.Product');


    Auth::routes();

        Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
