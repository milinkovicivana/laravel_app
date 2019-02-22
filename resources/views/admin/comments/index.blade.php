@extends('layouts.admin')



@section('content')


    @if(count($comments) > 0)

        <h1>Comments</h1>

        <table class="table">
           <thead>
             <tr>
               <th>ID</th>
               <th>Author</th>
               <th>Comment</th>
               <th>Post</th>
             </tr>
           </thead>
           <tbody>

               @foreach($comments as $comment)

                 <tr>
                   <td>{{$comment->id}}</td>
                   <td>{{$comment->user->name}}</td>
                   <td>{{$comment->body}}</td>
                   <td><a href="{{route('home.post', $comment->post_id)}}">View post</a></td>
                 </tr>

             @endforeach

           @else

               <h1 class="text-center">No comments</h1>

           @endif

      </tbody>
    </table>



@stop