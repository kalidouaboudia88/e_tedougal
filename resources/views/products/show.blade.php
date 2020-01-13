@extends('layouts.design')
@section('content')
    <div class="container mt-5" style="width: 60vw">
        <div class="row align-items-start my-5">
            <div class="col-lg-5">
                <p><img class="img-fluid rounded mb-4 mb-lg-0" src="{{$product->images ?? asset('uploads/images/default.png')}}" alt=""></p>
                <h3 class="font-weight-light">{{$product->name}}</h3>
                <p>{{$product->price.'F CFA' ?? ''}}</p>
                <hr>
                <div class="seller-div">
                    <h3>Infos du vendeur</h3>
                    <strong>{{$product->seller->user->name}}</strong><br><br>
                    <strong><i class="fa fa-home"></i>Adresse:</strong>{{$product->seller->business_address}}<br><br>
                    <strong><i class="fa fa-phone-alt"></i> Adresse:</strong>{{$product->seller->business_phone_number}}<br>
                </div>
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-7">
                <p>{!!$product->description!!}</p>
                <form action="#" id="{{'product_'.$product->id}}" class="add-to-cart">
                    @csrf
                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button type="submit" class="btn btn-primary btn-fancy" href="/produit/{{$product->id}}/show">Ajouter au panier</button>
                </form>
            </div>
            <!-- /.col-md-4 -->
        </div>
    </div>

@endsection
