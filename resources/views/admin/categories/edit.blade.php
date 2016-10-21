@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Category: {{$category->name}}</h1>

        @if($errors->any())
            <ul class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($category, ['route'=>['categories.update', $category->id],'method'=>'put']) !!}

        @include('admin.categories._form')

        {!! Form::submit('Save category',['class'=>'btn btn-success']) !!}

        <a href="{{ route('categories.index') }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}

        <br>
        <br>

    </div>
@endsection
