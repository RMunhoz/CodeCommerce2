@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Product</h1>

        @if($errors->any())
            <ul class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'products.store', 'method'=>'post']) !!}

        @include('products._form')

        {!! Form::submit('Add Product',['class'=>'btn btn-primary']) !!}
        <a href="{{ route('products.index') }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}
        <br>
        <br>

    </div>
@endsection
