@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Products</h1>

        <a href="{{ route('products.create') }}" class="btn btn-default">New Product</a>
        <br>
        <br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ str_limit($product->description, $limit = 100, $end = '...') }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-default">Edit</a>
                    <a href="{{ route('products.image', [$product->id]) }}" class="btn btn-success">Image</a>
                    <a href="{{ route('products.destroy', [$product->id]) }}" class="btn btn-danger">Destroy</a>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $products->render() !!}

    </div>
@endsection
