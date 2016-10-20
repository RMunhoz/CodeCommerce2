@extends('layouts.store')

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="container">

            <h3>Meus pedidos</h3>

            <table class="table">
                <tbody>
                <tr>
                    <th class="text-center">Codigo Compra</th>
                    <th class="text-center">Itens</th>
                    <th class="text-center">Quantidade</th>
                    <th class="text-center">Valor Total</th>
                    <th class="text-center">Status Entrega</th>
                </tr>

                @foreach($orders as $order)
                    <tr>
                        <td class="text-center">{{$order->id}}</td>
                        <td>
                            <ul class="text-left">
                                @foreach($order->items as $item)
                                    <li>{{$item->product->name}} - R$ {{ number_format($item->price, 2, ',', '.') }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="text-center">
                                @foreach($order->items as $item)
                                    <li>{{$item->qtd}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">R$ {{ number_format($order->total, 2, ',', '.') }}</td>
                        <td class="text-center">{{$order->status}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop