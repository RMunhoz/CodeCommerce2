@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Order</h1>

        @if($errors->any())
            <ul class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($order, ['route'=>['account.update', $order->id],'method'=>'put']) !!}

        @include('admin.orders._form')

        {!! Form::submit('Save Order',['class'=>'btn btn-success']) !!}

        <a href="{{ route('account.index') }}" class="btn btn-default">Voltar</a>

        {!! Form::close() !!}

        <br>
        <br>

    </div>
@endsection
