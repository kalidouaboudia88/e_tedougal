<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{


    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        return view("accueil");
    }


    public function show($slug){
        return view('Products.show', compact("slug"));  
    }
    public function bo($tes){
        return view('backoffice.index', compact("tes"));  
    }
    public function index2(){
        return view("categories.index");
    }
    public function ajout_category(Request $request){
        $data = $request->validate([
            'name' => 'required | min:3',
            
        ]);
        $category = new \App\Category();
        $name = $request->input('name');
        
        if($saved = \App\Category::updateOrCreate(['name'=>$name]))
            return response()->json([
                'message'   => 'Categorie enregistrée',
                'data'   => ['id'=>$saved->id,'name'=>$name],
                'errors'    => []
            ],
                200);
        else
            return response()->json(['message' => 'Erreur lors de la modification', 'status' => 401,'errors'=>$data->errors()->all()],200);
     }

     public function add_to_cart(Request $request){
   //On recupere le produit dans la BD a partir de l'id qui est passe en parametre
   $product = Product::find($request->input('product_id'));
   //On s'assure qu'il y'a bien un produit qui est retourne
   if($product){
       //On enregistre la session cart dans une variable
       $cart = $request->session()->get('cart');
       //On verifie si la cle du produit est deja dans les produits dans la session avant de l'ajouter
       if(!isset($cart['products'][$product->id])){
           //On prepare comment ajouter le produit dans les sessions. Chaque produit dans la sessoin set enregistre dans une cle cart. cette cle contient un
           $cart['products'][$product->id] = ['name' => $product->name, 'price' => $product->price, 'quantite' => 1, "total" => $product->price];
           //On ajoute la variable $cart dans les sessions
           $request->session()->put('cart',$cart);
       }
   }
   return response()->json(['success' => true,], 200);
}


 
}