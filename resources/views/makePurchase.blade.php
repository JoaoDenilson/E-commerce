@php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
@endphp
@extends('layouts.master')

@section('content')
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
                        <strong>Nome do comprador </strong>
                        <br>
                        Bairro: Teste
                        <br>
                        Rua: teste..... Numero: 10
                        <br>
                        <bbr>Telefone:</bbr> (213) 484-6829
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Data: 21/09/2020</em>
                    </p>
                    <p>
                        <em>Numero do pedido #: 34522677W</em>
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
                        <th>Items</th>
                        <th>#</th>
                        <th class="text-center">Preço</th>
                        <th class="text-center">Total </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="col-md-9"><em>Baked Rodopa Sheep Feta</em></h4></td>
                        <td class="col-md-1" style="text-align: center"> 2 </td>
                        <td class="col-md-1 text-center">13 R$</td>
                        <td class="col-md-1 text-center">26 R$</td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right"><h5><strong>Total: </strong></h5></td>
                        <td class="text-center text-danger"><h5><strong>31.53</strong></h5></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
