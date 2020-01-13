@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div>
                <p>
                    <a href="/admin/seller/create" class="btn btn-primary">Enregistrer un commerçant</a>
                </p>
            </div>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Nom Prenom</th>
                    <th>Num Register</th>
                    <th>Date enregistrement</th>
                    <th></th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <th>#</th>
                        <th><strong>{{$user->name}}</strong></th>
                        <th>{{ $user->register_number ?? '' }}<br><span>{{$user->seller->business_address}} - {{$user->business_phone_number}}</span></th>
                        <th>{{ $user->created_at ?? '' }}</th>
                        <th>
                            <div class="row justify-content-around">
                                <p><a href="/admin/seller/{{$user->id}}/edit" class="btn btn-primary "><i class="fa  fa-pen-alt"></i> Editer</a></p>
                                <form action="/admin/seller/{{$user->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Supprimer</button>
                                </form>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
