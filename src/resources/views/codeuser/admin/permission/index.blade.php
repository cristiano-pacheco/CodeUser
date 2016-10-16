@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Permissions</h3>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <a href="{{ route('admin.permissions.show', ['id' => $permission->id]) }}"
                           class="btn btn-default">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@stop