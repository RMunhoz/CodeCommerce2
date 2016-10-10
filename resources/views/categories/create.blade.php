@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Category</h1>

        @if($errors->any())
            <ul class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'categories.store', 'method'=>'post']) !!}

        @include('categories._form')

        {!! Form::submit('Add Category',['class'=>'btn btn-primary']) !!}

        <a href="{{ route('categories.index') }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}

    </div>
@endsection
