@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Edit User: {{ $user->name }}</b></div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        {!! Form::model($user, ['route'=>['users.update', $user->id], 'method' => 'put']) !!}
                        @include('admin.users._form')
                        <div class="form-group">
                            {!! Form::label('is_admin', 'Admin:') !!}
                            {!! Form::checkbox('is_admin') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Save User', ['class'=>'btn btn-info']) !!}
                            <a href="{{ route('users.index') }}" class='btn btn-default '>Back</a>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection