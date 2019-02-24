@extends('layouts.admin')



@section('content')

    @if(Session::has('deleted_photo'))

        <p class="bg-danger">{{session('deleted_photo')}}</p>

    @endif

<h1>Media</h1>

    <table class="table">
       <thead>
         <tr>
           <th>ID</th>
           <th>Photo</th>
           <th>Created</th>
           <th>Updated</th>
         </tr>
       </thead>
       <tbody>

       @if($photos)

         @foreach($photos as $photo)

             <tr>
               <td>{{$photo->id}}</td>
               <td><img src="{{$photo->file}}" alt="" height="80"></td>
               <td>{{$photo->created_at != null? $photo->created_at->diffForHumans() : ""}}</td>
               <td>{{$photo->updated_at != null? $photo->updated_at->diffForHumans() : ""}}</td>
               <td>
                   {!! Form::open(['method'=>'delete','action'=>['AdminPhotosController@destroy', $photo->id]]) !!}

                   	<div class="form-group">

                   	    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                   	</div>

                   {!! Form::close() !!}

               </td>
             </tr>

         @endforeach

       @endif

      </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$photos->render()}}

        </div>
    </div>


@stop