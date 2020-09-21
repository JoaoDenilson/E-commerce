@php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
@endphp
@extends('layouts.master')

@section('content')
        <h1> Carrinho de compras. </h1>
        @if(isset ($_SESSION['carrinho']))
            @foreach($_SESSION['carrinho'] as $aux)
                {{var_dump($aux)}}
                <br><br>
                {{$aux['quantityPurchased']}}
                <br><br>
            @endforeach
        @endif

@endsection
