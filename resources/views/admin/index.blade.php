@extends('layouts.admin')

@section('title')
    Administração
@stop

@section('content')

    @include('alerts.error')
    @include('alerts.success')

    <div class="container">
        <h2>{{ Auth::user()->name }}</h2>
        <h4>Seja bem vindo, ao painel de Administração!!!</h4>
    </div>
@stop