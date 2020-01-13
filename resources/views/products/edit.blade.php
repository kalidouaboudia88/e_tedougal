@extends('layouts.admin')

@section('content')
    <div class="container">
        @if($errors->any)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        <div><h2>{{__('Modification d\'un produit')}}</h2><a href="{{route('product.index')}}">Retourner sur la liste</a></div>
        <div class="container">
            <form action="/admin/product/{{$product->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div>
                    <input type="text" name="name" class="form-control" placeholder="le nom du produit" value="{{$product->name}}">
                </div>
                <div>
                    <input type="text" name="price" class="form-control" placeholder="Le prix du produit" value="{{$product->price}}">
                </div>
                <div>
                    <textarea name="description" id="description" cols="30" rows="10" class="description form-control" placeholder="La description">{{$product->description}}</textarea>
                </div>
                <div>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value=""></option>
                        @foreach($categories as $key => $value)
                            <option value="{{$key}}" {{ $key == $product->category_id ? 'selected="selected"':''}}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-6 text-right"><img src="{{$product->images ? asset($product->images) : asset('uploads/images/default.png')}}" alt="{{$product->name}}" width="100"></div><div class="col-6"><h3>Chargez une autre image pour remplacer celle-ci</h3></div>
                </div>
                <div>
                    <input type="file" name="product_image" class="form-control">
                </div>
                <div>
                    <button class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>

    </div>
@endsection
