@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Roles</h3>

        <a href="{{ route('admin.roles.create') }}" class="btn btn-default">Create Role</a>

        <br><br>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('admin.roles.edit', ['id' => $role->id]) }}"
                           class="btn btn-default">Edit</a>

                        <a href="{{ route('admin.roles.delete', ['id' => $role->id]) }}"
                           class="btn btn-default">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@stop