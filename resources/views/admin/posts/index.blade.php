@extends('layouts.admin')


@section('content')

    @if(Session::has('created_post'))

        <p class="alert alert-success">{{session('created_post')}}</p>

    @elseif(Session::has('updated_post'))

        <p class="alert alert-success">{{session('updated_post')}}</p>

    @elseif(Session::has('deleted_post'))

        <p class="alert alert-danger">{{session('deleted_post')}}</p>

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
               <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
               <td>{!! str_limit($post->body, 15) !!}</td>
               <td>{{$post->category ? $post->category->name : 'Uncategorised'}}</td>
               <td>{{$post->user->name}}</td >
               <td>{{$post->created_at->diffForHumans()}}</td>
               <td>{{$post->updated_at->diffForHumans()}}</td>
               <td><a href="{{route('home.post', $post->slug)}}">View post</a></td>
               <td><a href="{{route('admin.comments.show', $post->id)}}">View comments</a></td>
             </tr>
             {{--<td>{{str_limit($post->body, 15)}}</td>--}}
         @endforeach

       @endif

      </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$posts->render()}}

        </div>
    </div>

@stop