@extends('layouts.admin')

@section('content')
    <div class="container">
        <div>
            <p><a href="{{route('categories.create')}}" class="btn btn-success">Ajouter une category</a></p>
        </div>
        <table class="table table-striped" id="category_table">
            <tr>
                <th>#</th>
                <th>Nom Categorie</th>
                <th></th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>#</td>
                    <td>
                        {{$category->name}}
                        {!! $category->badgeOnMenu()!!} - {{$category->slug ?? ''}}
                    </td>
                    <td>
                        <div class="row justify-content-end">
                        <div class="col"><a href="/admin/categories/{{$category->id}}/edit" class="btn btn-primary">Editer</a></div>
                        <form class="col" action="/admin/categories/{{$category->id}}" method="post">
                            @csrf @method('delete')
                            <button type="submit" class="btn btn-danger">Suppimer</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="modal fade" id="add_category" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="category_form">
                        @csrf
                        <div>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="on_menu" class="form-check-label">Afficher la category sur le menu <input type="checkbox" id="on_menu" name="on_menu" value="1"></label>
                        </div>
                        <div class="mt-5">
                            <button class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    {{--<script defer>
            let form = document.getElementById("category_form");
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                let donnees_formulaire = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: '/admin/ajout_category',
                    data: donnees_formulaire,
                    success: function(data){
                        alert("Category ajoutée");
                        console.log(donnees_formulaire);
                        $("#category_table").append(`<tr> <td>#</td> <td> ${data.data.name} </td> <td> <div class="row justify-content-end"> <div class="col"><a href="/categories/${data.data.id}/edit" class="btn btn-primary">Editer</a></div> <form class="col" action="/categories/${data.data.id}" method="post"> <input type="hidden" name="_token" value="{{@csrf_token()}}"> <input type="hidden" name="_method" value="delete">                            <button type="submit" class="btn btn-danger">Suppimer</button> </form> </div> </td> </tr>`);
                        $('#add_category').modal('hide');
                        //window.location.href = '{{url('/categories')}}'
                    }
                });
            })
        </script>--}}
@endsection
