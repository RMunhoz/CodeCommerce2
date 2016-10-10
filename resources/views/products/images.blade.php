@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Images of {{ $product->name }}</h1>

        <a href="{{ route('products.create.image', ['id'=>$product->id]) }}" class="btn btn-default">New Image</a>
        <br>
        <br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Extension</th>
            </tr>
            @foreach($product->images as $image)
            <tr>
                <td>{{ $image->id }}</td>
                <td>
                    <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="80">
                </td>
                <td>{{ $image->extension }}</td>
                <td>
                    <a href="{{ route('products.destroy.image', ['id'=>$image->id]) }}"
                                class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>

        <a href="{{ route('products.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection
