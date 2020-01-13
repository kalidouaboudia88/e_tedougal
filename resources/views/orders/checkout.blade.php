@extends('layouts.design')

@section('content')
    <div class="container mt-5">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-8 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">{!! $message !!}</h1>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </div>
@endsection
