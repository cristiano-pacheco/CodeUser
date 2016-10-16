@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Show Permission - {{$permission->name}}</h3>

        <ul class="list-unstyled">
            <li>
                <strong>name:</strong> {{ $permission->name }}
            </li>
            <li>
                <strong>Description:</strong> {{ $permission->description }}
            </li>
        </ul>

    </div>

@stop