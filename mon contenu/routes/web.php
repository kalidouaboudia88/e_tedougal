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
//Route::get('/', function () {
   // return view('accueil');
// });
//Route::get('/', function () {
  // return view('welcome');
//s});
//Route::get("/produits", function () {
    //return "je suis la page des produits";
//});
//Route::get("/produits/{id}", function ($id) {
    //return "je le produits $id";
//});

//Auth::routes();

Route::get('/', 'HomeController@index')->name('accueil');
Route::get('/home1', 'HomeController@moi');
Route::get("/inscription", function () {
    return view('inscription');
});
Route::post("/inscription", function () {
    return 'votre email est:' .request('email');
});
Route::get('/products','ProductsController@index')->name('products');
Route::get('/products/create','ProductsController@create')->name('product_create');
Route::post('/products/create','ProductsController@store')->name('store_products');
Route::get('products/{id}/edit','ProductsController@edit')->name("editer_produit");
Route::patch('products/{id}/edit', 'ProductsController@update')->name('update_product');

Route::get('/create','ProductsController@create1')->name('create');
Route::delete('/product/{id}', 'ProductsController@destroy');
Route::get("/products/{id}/show", 'ProductsController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/categories/index','CategoriesController@index2')->name('index');
Route::post('/categories/index','CategoriesController@ajout_category')->name('ajout_category');
Route::post('/products/add_to_cart', "CategoriesController@add_to_cart");
//je viens ce qui en dessous

//Route::get('/', "HomeController@index");
//Route::get("/products/{id}", "HomeController@show");
//Route::get("/products/{slug}/show", 'ProductsController@show');
//Route::get("/products/category/{slug}", "ProductsController@category");
///Route::post('/product/add_to_cart', "AjaxController@add_to_cart");
///Route::get('/cart', "OrdersController@cart");
//Route::get('/checkout', 'OrdersController@checkout');
//Route::get('/success_cart', 'OrdersController@/success_cart');



