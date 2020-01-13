<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Parent_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('verified')->only('welcome');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        $sliderProducts = Product::orderBy('created_at', 'DESC')->select('name','images','price')->take(3)->get();
        $products = Product::all()->take(6);//paginate(6);
        return view('home', compact('products','sliderProducts'));
    }

    public function welcome(){
        $products = Product::all()->take(6);//paginate(6);
        return view('home', compact('products'));
    }
}
