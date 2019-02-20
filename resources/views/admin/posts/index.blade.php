@extends('layouts.admin')


@section('content')

    @if(Session::has('created_post'))

        <p class="bg-success">{{session('created_post')}}</p>

    @elseif(Session::has('updated_post'))

        <p class="bg-success">{{session('updated_post')}}</p>

    @elseif(Session::has('deleted_post'))

        <p class="bg-danger">{{session('deleted_post')}}</p>

    @endif

    <h1>Posts</h1>

    <table class="table">
       <thead>
         <tr>
           <th>ID</th>
           <th>Photo</th>
           <th>Title</th>
           <th>Body</th>
           <th>Category</th>
           <th>User</th>
           <th>Created</th>
           <th>Updated</th>
         </tr>
       </thead>
       <tbody>

       @if($posts)

         @foreach($posts as $post)

             <tr>
               <td>{{$post->id}}</td>
               <td><img src="{{$post->photo ? $post->photo->file : '/empty-image.png'}}" alt="" height="50"></td>
               <td>{{$post->title}}</td>
               <td>{{$post->body}}</td>
               <td>{{$post->category_id}}</td>
               <td>{{$post->user->name}}</td>
               <td>{{$post->created_at->diffForHumans()}}</td>
               <td>{{$post->updated_at->diffForHumans()}}</td>
             </tr>

         @endforeach

       @endif

      </tbody>
    </table>

@stop