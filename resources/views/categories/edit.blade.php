@extends('layouts.admin')

@section('content')
    <div class="container">
        <div><h1>Edition d'une catégorie</h1></div>
        <div class="container">
            <form id="category_form" action="/admin/categories/{{$category->id}}" method="post">
                @csrf
                @method('patch')
                <div>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <div class="mt-2">
                    <label for="on_menu" class="form-label">
                        Ajouter la category au menu <input type="checkbox" name="on_menu" value="1" {{$category->on_menu?'checked="checked"':''}}>
                    </label>
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    {{--<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script defer>
        let form = document.getElementById("category_form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            let donnees_formulaire = $(this).serialize();
            $.ajax({
                type: "POST",
                url: '/admin/edit_category',
                data: donnees_formulaire,
                success: function(data){
                    window.location.href = '{{url('/admin/categories')}}'
                }
            });
        })
    </script>--}}
@endsection
