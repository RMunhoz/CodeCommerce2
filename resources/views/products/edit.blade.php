@extends('app')

@section('content')
    <div class="container">
        <h1>Edit Category {{ $product->name }}</h1>

        @if($errors->any())
            <ul class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($product,['route'=>['products.update',$product->id], 'method'=>'put']) !!}

            @include('products._form')

        {!! Form::submit('Save Product', ['class'=>'btn btn-primary']) !!}

        <a href="{{ route('products.index') }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}
        <br>
        <br>

    </div>
@endsection
