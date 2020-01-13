@extends('layouts.design')

@section('content')
    <section class="cart_area pt-5">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Produit</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart['products'] as $panier)
                            <tr>
                                <td scope="col">{{$panier['name']}}</td>
                                <td scope="col">{{$panier['price']}}</td>
                                <td scope="col">{{$panier['quantite']}}</td>
                                <td scope="col">{{$panier['total']}}F CFA</td>
                            </tr>
                        @endforeach
                        <tr class="out_button_area">
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="btn btn-primary" href="/checkout">Confirmer la commande</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
