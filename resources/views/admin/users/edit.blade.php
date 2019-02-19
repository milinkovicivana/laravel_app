@extends('layouts.admin')



@section('content')

    <h1>Edit user</h1>

    <div class="row">

    <div class="col-sm-3">

        <img src="{{$user->photo ? $user->photo->file : '/profile.png'}}" alt="" class="img-responsive img-rounded">

    </div>

    <div class="col-sm-9">

        {!! Form::model($user, ['method'=>'patch','action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

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
                {!! Form::select('is_active', array(1 => 'Yes', 0 => 'No'), null, ['class'=>'form-control']) !!}



            </div>
            <div class="form-group">

                {!! Form::submit('Edit', ['class'=>'btn btn-primary']) !!}

            </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'delete', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

        	<div class="form-group">

        	    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

        	</div>

        {!! Form::close() !!}

    </div>

    </div>
    <div class="row">

        @include('includes.formError')

    </div>

@stop


