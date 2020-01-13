@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="container">
            <h2>Enregistrement d'un commerçant</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form action="/admin/seller" method="post" id="seller_form">
                @csrf
                <div><input type="text" name="name" class="form-control" placeholder="Nom du commerçant"></div>
                <div><input type="text" name="email" class="form-control" placeholder="Adresse email"></div>
                <div><input type="text" name="register_number" class="form-control" placeholder="Numero de registre"></div>
                <div><input type="text" name="business_phone_number" class="form-control" placeholder="Numero de téléphone"></div>
                <div><input type="text" name="business_address" class="form-control" placeholder="Numero de téléphone"></div>
                <div class="mt-5">
                    <button class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
