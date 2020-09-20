@extends('layouts.master')

@section('content')
    <style type="text/css">
        .my-list {
            width: 100%;
            padding: 20px;
            float: left;
            margin: 15px 0;
            border-radius: 5px;
            box-shadow: 2px 3px 0px #e4d8d8;
            position:relative;
            overflow:hidden;
        }
        .my-list h3{
            text-align: left;
            font-size: 20px;
            font-weight: 500;
            line-height: 21px;
            margin: 0px;
            padding-top: 20px;
            margin-bottom: 5px;
            padding-bottom: 5px;
        }
        .my-list .pull-right{
            font-size: 15px;
        }
        .my-list .offer{
            width: 100%;
            float: left;
            margin: 5px 0;
            margin-top: 5px;
            padding-top: 5px;
        }

    </style>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Produtos em oferta</li>
            </ol>
        </nav>
        <div class="row">
            @foreach($products as $aux)
                <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12">
                    <div class="my-list">
                        <img src="{{asset('itens_image/'.$aux['url_image'])}}" alt={{$aux['url_image']}} class="img-thumbnail" />
                        <h3>{{$aux['name']}}</h3>
                        <span>R$:{{$aux['valueProduct']}}</span>
                        <span class="pull-right">- {{$aux['description']}}</span>
                        <div class="offer">{{$aux['discount']}}0% de desconto.</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
