@extends('layouts.admin')

@section('content')
    <div class="container">
        <div><p><a href="{{route('categories.index')}}">liste des catégorie</a></p></div>
        <div class="container">
            <form action="/admin/categories/" method="post" id="category_form">
                @csrf
                <div>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="on_menu" class="form-check-label">Afficher la category sur le menu <input class="form-control" type="checkbox" id="on_menu" name="on_menu" value="1"></label>
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
  {{--  <script defer>
        let form = document.getElementById("category_form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            let donnees_formulaire = $(this).serialize();
            $.ajax({
                type: "POST",
                url: '/edit_category',
                data: donnees_formulaire,
                success: function(data){
                    alert(data.status);
                    window.location.href = '{{url('/categories')}}'
                    //$("#msg").html(data.msg);
                }
            });
        })
    </script>--}}
@endsection
