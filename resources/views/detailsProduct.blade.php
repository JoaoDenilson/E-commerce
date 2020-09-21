@extends('layouts.master')

@section('content')
    <div class="container">
        Detalhes do produto.
        <h1> {{$product['name']}} </h1>
    </div>

@endsection
