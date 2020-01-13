@extends('layouts.app')

@section('content')
<form action="{{route('update_product',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
   @csrf
   @method('patch')
   <div><input type="text" name="name" class="form-control" placeholder="le nom du produit" value="{{$product->name}}"></div>
   <div><input type="text" name="prix" class="form-control" placeholder="Le prix du produit" value="{{$product->prix}}"> </div>
   <div> <textarea name="description_produit" id="description_produit" cols="30" rows="10" class="form-control" placeholder="La description">{{$product->description_produit}}</textarea> </div>
   <div class="row">
       <div class="col-6 text-right"><img src="{{asset($product->images)}}" alt="{{$product->name}}" width="100"></div><div class="col-6"><h3>Chargez l'image</h3></div>
</div>
<div>
   <input type="file" name="image_produit" class="form-control">
</div>

   <div><input type="text" name="quantite_produit" class="form-control" placeholder="La disponible" value="{{$product->quantite_produit}}"> </div>
   <div> <button class="btn btn-primary">Enregistrer</button> </div>
</form>
@endsection

