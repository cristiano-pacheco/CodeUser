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
            {!! Form::label('email',"Email:") !!}
            {!! Form::text('email',  $user->email, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password',"Password:") !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('roles[]',"Roles:") !!}
            {!! Form::select('roles[]', $roles, $user->roles->pluck('id')->toArray(),
                ['class'=>'form-control', 'multiple' => 'multiple']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit',['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@stop