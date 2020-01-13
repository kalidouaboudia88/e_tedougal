@extends('layouts.app')
@section('content')
<div class="container mt-5" style="width: 60vw">
        <div class="row align-items-start my-5">
            <div class="col-lg-5">
                <p><img class="img-fluid rounded mb-4 mb-lg-0" src="{{$product->image_produit ?? asset('uploads/images/default.png')}}" alt=""></p>
                <h3 class="font-weight-light">{{$product->name}}</h3>
                <p>{{$product->prix.'F CFA' ?? ''}}</p>
                <hr>
                
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-7">
                <p>{!!$product->description_produit!!}</p>
                <form action="#" id="{{'product_'.$product->id}}" class="add-to-cart">
                    @csrf
                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button type="submit" class="btn btn-primary btn-fancy" href="/products/{{$product->id}}/show">Ajouter au panier</button>
                </form>
            </div>
            <!-- /.col-md-4 -->
        </div>
    </div>
@endsection
