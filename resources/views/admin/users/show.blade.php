@extends('layouts.admin')

@section('content')
    <h3>{{ $user->name }}</h3>
    <br>

    <p><b>Name:</b> {{$user->name}}</p>
    <p><b>Email:</b> {{$user->email}}</p>
    <p><b>Endereço:</b> {{$user->address . ", " . $user->number }}</p>
    <p><b>Bairro:</b> {{ $user->district . " - CEP: " . $user->cep }}</p>
    <p><b>Cidade:</b> {{ $user->city . " - " . $user->state }}</p>
    <p><b>Administrador:</b> {{$user->is_admin ? "Sim" : "Não"}}</p>

    <br>
    {{--<a href="{{ route('users.edit', ['id'=>$user->id]) }}" class='btn btn-info '>Edit</a>--}}
    <a href="{{ route('users.destroy', ['id'=>$user->id]) }}" class='btn btn-danger '>Delete</a>
    <a href="{{ route('users.index') }}" class='btn btn-default '>Back</a>
    <br>
    <br>

@endsection