@extends('layouts.app')

@section('content')
<div class="container">
           <form action="" id="category_form" method="post">
               @csrf
               <div>
                   <input type="text" name="name" class="form-control" placeholder="ecrivez le nom de la categorie">
               </div>
               <div>
                   <button type="submit" class="btn btn-primary">Enregistrer</button>
               </div>
           </form>
<script>
   let form = document.getElementById("category_form");
   form.addEventListener('submit', function(e) {
       e.preventDefault();
       alert('here');
       let donnees_formulaire = $(this).serialize();
       $.ajax({
           type: "POST",
           url: '/categories/index',
           data: donnees_formulaire,
           success: function(data){
               alert("Category ajoutée");
               console.log(donnees_formulaire);
               $("#category_table").append(`<tr> <td>#</td> <td> ${data.data.name} </td> <td> <div class="row justify-content-end"> <div class="col"><a href="/categories/${data.data.id}/edit" class="btn btn-primary">Editer</a></div> <form class="col" action="/categories/${data.data.id}" method="post"> <input type="hidden" name="_token" value="{{@csrf_token()}}"> <input type="hidden" name="_method" value="delete">                            <button type="submit" class="btn btn-danger">Suppimer</button> </form> </div> </td> </tr>`);
               $('#add_category').modal('hide');
           }
       });
   })
</script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
@endsection
  