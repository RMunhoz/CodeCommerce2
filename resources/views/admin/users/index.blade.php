@extends('layouts.admin')

@section('content')
    <h1>Users</h1>

    <a href="{{route('users.create')}}" class="btn btn-info">New User</a>
    <br>
    <br>

    <table class="table">
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Is Admin</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td class="text-center">{{$user->id}}</td>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center">{{$user->email}}</td>
                <td class="text-center">{{ $user->is_admin ? "Yes": "No"}}</td>
                <td class="text-center">
                    <a href="{{ route('users.show', ['id'=>$user->id]) }}"
                       class="btn btn-info">Show</a>
                    <a href="{{ route('users.edit', ['id'=>$user->id]) }}"
                       class="btn btn-warning">Edit</a>
                    <a href="{{ route('users.destroy', ['id'=>$user->id]) }}"
                       class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    <br>

    {!! $users->render() !!}

    <br>
    <br>
@endsection