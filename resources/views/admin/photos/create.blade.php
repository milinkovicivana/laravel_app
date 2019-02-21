@extends('layouts.admin')



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">





@section('content')

    <h1>Upload photo</h1>

    {!! Form::open(['action'=>'AdminPhotosController@store', 'class'=>'dropzone']) !!}


    {!! Form::close() !!}



@stop




<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>


