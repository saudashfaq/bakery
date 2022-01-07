<?php

use Illuminate\Support\Facades\Route;
use App\Models\Attribute;
use App\Models\Product;
//use App\Http\Controllers\Admin\UserController;
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

//for product show dynamically product recipe
Route::get('/ajax-productRecipe', function (){
    $product_id = Input::get('product_id');
    $products = Product::with(['stocks','units'])->where('id' , '=' ,$product_id )->get();

    return Response::json($products);

});
// for show attributes in fields when select head attributes in create product recipe form .
Route::get('/ajax-attribute', function(){

    $attributeHead_id = Input::get('attributeHead_id');
    $attribute = Attribute::where('attribute_head_id', '=', $attributeHead_id)->get();

    return Response::json($attribute);
});
Route::get('/index.html','App\Http\Controllers\PagesController@theme');

Route::get('/', 'App\Http\Controllers\PagesController@index');

// closure  function

Route::get('/about', 'App\Http\Controllers\PagesController@about');

Route::get('/services', 'App\Http\Controllers\PagesController@services');

//resource....
//Route::resource('products', 'App\Http\Controllers\ProductsController');

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
Route::get('/historybyid{id}', 'App\Http\Controllers\HistoryController@showHistoryById')->name('history.byid');

//route for product create.....
Route::get('/showproduct', 'App\Http\Controllers\ProductionController@index')->name('show.products');

Route::get('/createproduct', 'App\Http\Controllers\ProductionController@createProduct');
Route::post('/storeProduct', 'App\Http\Controllers\ProductionController@storeProduct')->name('storeProduct.product');
Route::get('/editproduct/{id}', 'App\Http\Controllers\ProductionController@editProduct')->name('edit.product');
Route::put('/updateproduct/{id}', 'App\Http\Controllers\ProductionController@updateProduct')->name('update.product');
/*recipe*/
Route::get('/editrecipe/{id}', 'App\Http\Controllers\ProductionController@editrecipe')->name('edit.recipe');
Route::post('/editAbleRecipe/{id}', 'App\Http\Controllers\ProductionController@editAbleRecipe')->name('editable.recipe');
Route::post('/updaterecipe/{id}', 'App\Http\Controllers\ProductionController@updateRecipe')->name('update.recipe');

//Route::post('/storeProduct', 'App\Http\Controllers\ProductionController@storeProducted')->name('storeProduct.product');
Route::get('/showrecipe/{id}', 'App\Http\Controllers\ProductionController@show')->name('show.recipe');
//Route::get('/shows/{id}', 'App\Http\Controllers\ProductionController@show')->name('shows');
Route::delete('/productdelete/{id}', 'App\Http\Controllers\ProductionController@deleteProduct')->name('product.destroy');
Route::get('/createreadymadeproduct', 'App\Http\Controllers\ProductionController@createReadyMadeProduct')->name('create.readymadeproduct');
Route::post('/storereadymadeproduct', 'App\Http\Controllers\ProductionController@storeReadyMadeProduct')->name('store.readymadeproduct');
Route::get('/search', 'App\Http\Controllers\ProductionController@search')->name('search.product');

//Route::get('/productcreateRecipe/{id}', 'App\Http\Controllers\ProductionController@productCreateRecipe')->name('product.createRecipe');//del
//Route::post('/productsaveRecipe/{id}', 'App\Http\Controllers\ProductionController@productSaveRecipe')->name('product.saveRecipe');//del
/*rout for inventory*/
Route::get('produceproduct/{id}', 'App\Http\Controllers\ProductionController@produce')->name('produce.product');
Route::post('/storeProducedProduct/{id}', 'App\Http\Controllers\ProductionController@storeProducedProduct')->name('storeProduced.Product');
Route::get('showinventory', 'App\Http\Controllers\ProductionController@showInventory')->name('inventory');
/*Routes For Attributes */
Route::get('attribute/index' , 'App\Http\Controllers\Attributecontroller@index')->name('attributes.index');
Route::get('/createattribute', 'App\Http\Controllers\Attributecontroller@createAttribute')->name('create.attribute');
Route::post('/storeattribute', 'App\Http\Controllers\Attributecontroller@storeAttribute')->name('store.attribute');
Route::get('/editattribute{id}', 'App\Http\Controllers\Attributecontroller@editAttribute')->name('edit.attribute');
Route::post('/updateattribute/{id}', 'App\Http\Controllers\Attributecontroller@updateAttribute')->name('update.attribute');
Route::get('/createcategory', 'App\Http\Controllers\Attributecontroller@createCategory')->name('create.category');
Route::post('/storecategory', 'App\Http\Controllers\Attributecontroller@storeCategory')->name('store.category');

/*USER */
Route::get('user/profile' , 'App\Http\Controllers\Admin\UserController@profile')->name('profile');
Route::get('profile/edit' , 'App\Http\Controllers\Admin\UserController@edit')->name('admin.profileedit');
Route::post('profileupdate/{id}' , 'App\Http\Controllers\Admin\UserController@update')->name('admin.profileupdate');
Route::get('companydetail/edit' , 'App\Http\Controllers\Admin\UserController@companyDetailEdit')->name('admin.companyDetailEdit');
Route::post('companydetailupdate/{id}' , 'App\Http\Controllers\Admin\UserController@companyDetailUpdate')->name('admin.companyDetailUpdate');
Route::get('admin/users' , 'App\Http\Controllers\Admin\UserController@users')->name('admin.users');
Route::get('create/newuser' , 'App\Http\Controllers\Admin\UserController@createNewUser')->name('create.newuser');
Route::post('store/newuser' , 'App\Http\Controllers\Admin\UserController@storeNewUser')->name('store.newuser');
Route::get('edit/user{id}' , 'App\Http\Controllers\Admin\UserController@editUser')->name('edit.user');
Route::put('update/user/{id}' , 'App\Http\Controllers\Admin\UserController@updateUser')->name('update.user');
Route::delete('delete/user/{id}' , 'App\Http\Controllers\Admin\UserController@deleteUser')->name('delete.user');
/* / USER */
/*user resource route */
//Route::resource('/user' ,'App\Http\Controllers\Admin\UserController' );

Auth::routes();
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
