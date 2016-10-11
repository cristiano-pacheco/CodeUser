@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Users</h3>

        <a href="{{ route('admin.users.create') }}" class="btn btn-default">Create User</a>

        <br><br>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                           class="btn btn-default">Edit</a>

                        <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}"
                           class="btn btn-default">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@stop