@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <p>
            <a href="{{route('product.create')}}" class="btn btn-primary">Ajouter un produit</a>
        </p>
    </div>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Nom Produit</th>
            <th>Prix Produit</th>
            <th></th>
        </tr>
        @foreach($products as $product)
            <tr>
                <th>#</th>
                <th>{{$product->name}} - <img src="{{$product->images ? asset($product->images) : asset('uploads/images/default.png')}}" alt="{{$product->name}}" width="50"></th>
                <th>{{$product->price}} {{ $product->category->name ?? '' }}</th>
                <th>
                    <div class="row justify-content-around">
                    <p><a href="/admin/product/{{$product->id}}/edit" class="btn btn-primary "><i class="fa  fa-pen-alt"></i> Editer</a></p>
                    <form action="/admin/product/{{$product->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Supprimer</button>
                    </form>
                    </div>
                </th>
            </tr>
        @endforeach
    </table>
    <div class="text-center">{{$products->links()}}</div>
</div>
@endsection
