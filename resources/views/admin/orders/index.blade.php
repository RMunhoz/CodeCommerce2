@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Orders</h1>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Produtos</th>
                <th>Valor</th>
                <th class="text-center">Status</th>
                <th>Action</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        <ul class="text-left">
                            @foreach($order->items as $item)
                                <li>{{$item->product->name}} - R$ {{ number_format($item->price, 2, ',', '.') }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>R$ {{ number_format($order->total, 2, ',', '.') }}</td>
                    <td class="text-center">{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('account.edit', [$order->id]) }}" class="btn btn-default">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
