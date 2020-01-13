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
Route::get('/', "HomeController@index");
Route::get("/products/{id}", "HomeController@show");
Route::get("/produit/{slug}/show", 'ProductsController@show');
Route::get("/products/category/{slug}", "ProductsController@category");
Route::post('/product/add_to_cart', "AjaxController@add_to_cart");
Route::get('/cart', "OrdersController@cart");
Route::get('/checkout', 'OrdersController@checkout');
Route::get('/success_cart', 'OrdersController@/success_cart');

Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
//dans le controller register nous allons rediriger vers ce lien apres la creation d'un compte. Pour que cela fonctionne nous avons remplace protected $redirectTo = '/home'; par protected $redirectTo = '/welcome';
Route::get('/welcome', 'HomeController@welcome')->name('welcome');
//Route pour l'exemple d'un envoie de mail
Route::get('/abonnement/expired', "AbonnementController@expired");

Route::middleware(["can:seller"])->prefix('seller')->group(function(){
    Route::get('/',"ProductsController@seller");//list des produit d'un commercant
    Route::get('/products/create',"ProductsController@create");//Formulaire de creation
    Route::post('/products',"ProductsController@store");//traitement d'un enregistrement d'un product
    Route::get('/products/{product}/edit',"ProductsController@edit");//list des produit d'un commercant
    Route::patch('/products/{product}',"ProductsController@update");//list des produit d'un commercant
    Route::delete('/products/{product}',"ProductsController@destroy");//list des produit d'un commercant
    //Route::get('/products/create',"ProductsController@create");//list des produits d'un commercant
});

//Nous pouvons regrouper les routes. Ici je regroupe les routes concenant l'administrateur
Route::middleware(['can:admin'])->prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index');
    Route::get('/dashboard', 'AdminController@index');
    Route::resource('/seller', 'SellerController');
    /*Route::get("/categories", "CategoriesController@index")->name('categories.index');
    Route::get('/categories/form','CategoriesController@create')->name('categories.create');
    Route::post('/categorie/traitement','CategoriesController@store');*/
    Route::resource('categories','CategoriesController');

    # -------- CATEGORIES ----------
    /*Route::get("/product/edit/{id}", "ProductsController@edit")->name("editer_produit");
    Route::patch("/product/edit/{id}", "ProductsController@update")->name('updater_produit');
    Route::get("/produit/{slug}/show", 'ProductsController@show');
    Route::delete('product/{id}', 'ProductsController@destroy');*/
    Route::resource('product', 'ProductsController');

    //Ici nous definissons une liste de routes qui seront utiliser dans l'exemple sur ajax
    Route::post('/getmsg', 'AjaxController@index');
    Route::patch('/edit_category', 'AjaxController@edit_category');
    Route::post('/ajout_category', 'AjaxController@ajout_category');
});
