@extends('layouts.admin')


@section('content')

    <h1>Create post</h1>

    {!! Form::open(['action'=>'AdminPostsController@store', 'files'=>true]) !!}

    	<div class="form-group">

    		{!! Form::label('title', 'Title:') !!}
    		{!! Form::text('title', null, ['class'=>'form-control']) !!}

    		{!! Form::label('body', 'Content:') !!}
    		{!! Form::textarea('body', null, ['class'=>'form-control']) !!}

            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', array(0=>'javascript', 1=>'php'), null, ['class'=>'form-control']) !!}

            {!! Form::label('photo_id', 'Photo:') !!}
    		{!! Form::file('photo_id', ['class'=>'form-control']) !!}

    	</div>
    	<div class="form-group">

    	    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}

    	</div>

    {!! Form::close() !!}

    @include('includes.formError')

@stop