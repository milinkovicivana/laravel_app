@extends('layouts.admin')


@section('content')

    {{--@include('includes.tinyeditor')--}}

    <h1>Edit post</h1>

    <div class="row">

        <div class="col-sm-4">

            <img src="{{$post->photo ? $post->photo->file : '/empty-image.png'}}" alt="" class="img-responsive img-rounded">

        </div>

        <div class="col-sm-8">

            {!! Form::model($post, ['method'=>'patch', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">

                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}

                {!! Form::label('body', 'Content:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}

                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}

                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', ['class'=>'form-control']) !!}

            </div>
            <div class="form-group">

                {!! Form::submit('Edit', ['class'=>'btn btn-primary']) !!}

            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'delete', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

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