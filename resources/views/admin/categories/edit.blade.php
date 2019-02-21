@extends('layouts.admin')



@section('content')

    <h1>Categories</h1>


    <div class="col-sm-6">

        {!! Form::model($category, ['method'=>'patch', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group">

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}

        </div>
        <div class="form-group">

            {!! Form::submit('Edit', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'delete','action'=>['AdminCategoriesController@destroy', $category->id]]) !!}


        	<div class="form-group">

        	    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

        	</div>

        {!! Form::close() !!}


    </div>


@stop