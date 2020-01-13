<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except(['cart']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function cart(Request $request){
        if(!$request->session()->has('cart'))
            return redirect('/');
        $cart = $request->session()->get('cart');
        return view('products.cart', compact('cart'));
    }

    public function checkout(Request $request){
        if(!$request->session()->has('cart') || empty($request->session()->get('cart'))){
            return redirect('/');
        }
        $carts = $request->session()->get('cart');
        $cart_total = 0;
        foreach ($carts['products'] as $cart){
            $cart_total += $cart['total'];
        }
        $order = Order::create(['user_id' => Auth::id(), 'prix_total' => $cart_total]);
        if($order){
            foreach($carts['products'] as $key => $cart){
                $order_product = $order->products()->sync([$key]);
            }
            $request->session()->forget('cart');
            $message = "La commande a ete enregistree. Nous vous contacterons dans un bréf délai.<br>Merci de votre confiance.";
            return view('orders.checkout')->withMessage($message);
        }
        return redirect('/');
    }

}
