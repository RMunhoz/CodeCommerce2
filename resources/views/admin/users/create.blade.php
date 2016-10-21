@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'users.store']) !!}
    @include('admin.users._form')
    <div class="form-group">
        {!! Form::label('is_admin', 'Admin:') !!}
        {!! Form::checkbox('is_admin') !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add User', ['class'=>'btn btn-info']) !!}
        <a href="{{ route('users.index') }}" class='btn btn-danger '>Back</a>
    </div>
    {!! Form::close() !!}
    <br>
    <br>
@endsection