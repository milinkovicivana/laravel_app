@extends('layouts.admin')



@section('content')

<h1>Create users</h1>

{!! Form::open(['action'=>'AdminUsersController@store', 'files'=>true]) !!}

	<div class="form-group">

		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}

		{!! Form::label('email', 'Email:') !!}
		{!! Form::email('email', null, ['class'=>'form-control']) !!}

        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}

        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', ['class'=>'form-control']) !!}

        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', array('' => 'Choose') + $roles, null, ['class'=>'form-control']) !!}

        {!! Form::label('is_active', 'Active:') !!}
        {!! Form::select('is_active', array(1 => 'Yes', 0 => 'No'), 0, ['class'=>'form-control']) !!}



	</div>
	<div class="form-group">

	    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}

	</div>

{!! Form::close() !!}


@include('includes.formError')

@stop


