@php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
@endphp
@extends('layouts.master')

@section('content')
    @php
        //Função calculo de desconto.
        $valorCompra = 0;
        foreach($pedido as  $aux){
            $valorCompra = $valorCompra + $aux->valueUnit;
        }

    @endphp
{{--    <h1>teste</h1>--}}
<div class="container mb-4">
    <div style="width: 800px">
        <h3 style="text-align: center">Detalhes do pedido!</h3>
        <div class="col-12">
            <div>
                <h4>Endereço de entrega</h4>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>

                        @if(isset ($_SESSION['endereco']))
                            @foreach($_SESSION['endereco'] as $aux)
                                <strong> {{$_SESSION['user']['name']}}</strong>
                                <br>
                                Bairro: {{$aux['neighborhood']}}
                                <br>
                                Rua: {{$aux['street']}} Numero: {{$aux['numberHome']}}
                                <br>
                                CEP: {{$aux['cep']}}
                                <br>
                                <bbr>Telefone:</bbr> {{$_SESSION['user']['phone']}}
                            @endforeach
                        @endif
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>

                        <em>{{ date("d/m/Y")}}</em>
                    </p>
                    <p>
                        <em>Numero do pedido #: {{$pedido[0]->order_id}}</em>
                    </p>
                </div>
            </div>
            <div>
                <h4>Produtos</h4>
            </div>
            <div class="row">
                </span>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>#</th>
                        <th class="text-center">Preço</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedido as $aux)
                        <tr>
                            <td class="col-md-9"><em>{{$aux->name}}</em></td>
                            <td class="col-md-1" style="text-align: center"> {{$aux->quantityProduct}} </td>
                            <td class="col-md-1 text-center">{{$aux->valueUnit}}</td>
                        </tr>

                    @endforeach

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right"><h5><strong>Total: {{$valorCompra}}</strong></h5></td>
                        <td class="text-center text-danger"><h5><strong></strong></h5></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
