@extends('layouts.app')

@section('content')
<table class="table table-striped">
       <tr>
           <th>#</th>   
            <th>Nom Produit</th>          
             <th>Prix Produit</th>         
               <th>Description du produit</th>
               <th>Image du produit</th>
               <th>Quantite produit</th>
       </tr>
       @foreach($products as $product)
           <tr>
               <th>#</th>
               <th>{{$product->name}}</th>
               <th>{{$product->prix}} {{ $product->category->name ?? '' }}</th>
               <th>{{$product->description_produit}}</th>
               <th><img src="{{$product->image_produit ? asset($product->image_produit) : asset('uploads/images/default.png')}}" alt="{{$product->name}}" width="50"></th>
               <th>{{$product->quantite_produit}}</th>
               <th>
               <p><a href="{{route('editer_produit',['id'=>$product->id])}}">Editer</a>
</p>

               </th>
               <th>
               <form action="/product/{{$product->id}}" method="post">
               @csrf
               @method('delete')
               <input type="submit" class="btn btn-danger" name="delete" value="Supprimer">
           </form>
               </th>
           </tr>
       @endforeach
   </table>
   @endsection
