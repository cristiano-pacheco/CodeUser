@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Edit Role</h3>

        {!! Form::open(['method'=>'post','route' => [ 'admin.roles.update', 'id' => $role->id ]]) !!}

        <div class="form-group">
            {!! Form::label('name',"Name:") !!}
            {!! Form::text('name',  $role->name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('permissions[]',"Permissions:") !!}
            {!! Form::select('permissions[]', $permissions, $role->permissions->pluck('id')->toArray(),
                ['class'=>'form-control', 'multiple' => 'multiple']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit',['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@stop