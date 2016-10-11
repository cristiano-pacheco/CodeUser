@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Edit User</h3>

        {!! Form::open(['method'=>'post','route' => [ 'admin.users.update', 'id' => $user->id ]]) !!}

        <div class="form-group">
            {!! Form::label('name',"Name:") !!}
            {!! Form::text('name',  $user->name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email',"Name:") !!}
            {!! Form::text('email',  $user->email, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit',['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@stop