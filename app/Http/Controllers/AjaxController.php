<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('add_to_cart');
    }

    public function index(){
        $msg = "Ceci est le new message";
        return response()->json(array('msg' => $msg), 200);
    }

    public function edit_category(Request $request){
        $data = $request->validate([
            'name' => 'required | min:3',
            'on_menu' => 'nullable | digits_between:0,1'
        ]);
        $name = $request->input('name');
        $on_menu = $request->input('on_menu') ?? 0;
        if(\App\Category::updateOrCreate(['name'=>$name,'on_menu' => $on_menu]))
            return response()->json(['message' => 'Category modifiée','status' => 200],200);
        else
            return response()->json(['message' => 'Erreur lors de la modification', 'status' => 401],200);
        #return redirect('/categories')->with(['success' => 'Category enregistrée']);
    }

    public function ajout_category(Request $request){
        $data = $request->validate([
            'name' => 'required | min:3',
            'on_menu' => 'nullable | digits_between:0,1'
        ]);
        $category = new Category();
        $name = $request->input('name');
        $on_menu = $request->input('on_menu') ?? 0;
        if($saved = \App\Category::updateOrCreate(['name'=>$name,'on_menu' => $on_menu]))
            return response()->json([
                'message'   => 'Category modifiée',
                'data'   => ['id'=>$saved->id,'name'=>$name,'on_menu' => $on_menu],
                'status'    => 200,
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
