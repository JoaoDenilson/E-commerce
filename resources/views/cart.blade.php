@php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
@endphp
@extends('layouts.master')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section('content')
@php
    //Função calculo de desconto.
     $valorTotal = 0;
     $subTotal = 0;
     if (isset($_SESSION['carrinho'])){
        foreach($_SESSION['carrinho'] as $aux){
            $n = $aux['discount'].'0.0';
            $pctm = floatval($n);
            $valorQuantity = $aux['valueProduct'] * $aux['quantityPurchased'];
            $valorProduto = $valorQuantity - ( $valorQuantity / 100 * $pctm);
            //valor sub-total
            $subTotal = $subTotal + $valorQuantity;
            //valor total da compra
            $valorTotal = $valorTotal + $valorProduto;
        }
     }
     //$valorTotal;
@endphp
@if(isset ($_SESSION['carrinho']))
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <h5>Endereço</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> Cidade - UF</th>
                            <th scope="col" >Rua</th>
                            <th scope="col" >Bairro</th>
                            <th scope="col" >Numero</th>
                            <th scope="col" >cep</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset ($_SESSION['carrinho']))
                        @if(isset ($_SESSION['endereco']))
                            @foreach($_SESSION['endereco'] as $aux)
                            <tr>
                                <td> {{$aux['city']}} - {{$aux['uf']}}</td>
                                <td> {{$aux['street']}}</td>
                                <td> {{$aux['neighborhood']}}</td>
                                <td> {{$aux['numberHome']}} </td>
                                <td>{{$aux['cep']}}</td>
                            </tr>
                            @endforeach
                        @endif
                    @endif
                    </tbody>
                </table>
                <h5>Carrinho de compras</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produto</th>
                            <th scope="col">Desconto</th>
                            <th scope="col" class="text-center">Quantidade</th>
                            <th scope="col" class="text-right">Preço</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset ($_SESSION['carrinho']))
                                @foreach($_SESSION['carrinho'] as $aux)
                                    <tr>
                                        <td><img src="{{asset('itens_image/'.$aux['url_image'])}}" alt="Image" height="50" width="50"/> </td>
                                        <td>{{$aux['name']}}</td>
                                        <td>{{$aux['discount']}}0 %</td>
                                        <td class="text-center">{{$aux['quantityPurchased']}}</td>
                                        <td class="text-right">{{$aux['valueProduct']}}</td>
                                        <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                                    </tr>

                                @endforeach
                        @endif

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">{{$subTotal}},00 R$</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>{{$valorTotal}},00 R$</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a class="btn btn-primary" href="list-products" role="button">Continue comprando</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a class="btn btn-lg btn-block btn-success text-uppercase" href="#" role="button">Finalizar comprar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <div class="container">
        <div class="alert alert-primary text-center" role="alert">
            O carrinho está vazio.
        </div>
    </div>

@endif

@endsection
