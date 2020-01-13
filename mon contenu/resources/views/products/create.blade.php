@extends('layouts.app')

@section('content')
<div class="container">
           <form action="{{route('store_products')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div>
                   <input type="text" name="name" class="form-control" placeholder="Le nom du produit">
               </div>
               <div>
                   <input type="text" name="prix" class="form-control" placeholder="Le prix du produit">
               </div>
               <div>
                   <input type="file" name="image_produit" class="form-control" placeholder="Image du produit">
               </div>
               <div>
                   <input type="text" name="quantite_produit" class="form-control" placeholder="Quantite disponible">
               </div>
               <div>
                   <textarea name="description_produit" id="description_produit" cols="30" rows="10" class="form-control" placeholder="La description"></textarea>
               </div>
               <div>
   <select name="category_id" id="category_id" class="form-control">
      < <option value=""></option>
       @foreach($categories as $key => $value)
           <option value="{{$key}}" {{ $key == $product->category_id ? 'selected="selected"':''}}>{{$value}}</option>
       @endforeach
   </select>
</div>

               <div>
                   <button class="btn btn-primary">Enregistrer</button>
               </div>
               
           </form>
           @endsection