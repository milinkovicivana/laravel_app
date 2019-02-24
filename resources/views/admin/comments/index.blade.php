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
               <th>Replies</th>
             </tr>
           </thead>
           <tbody>

               @foreach($comments as $comment)

                 <tr>
                   <td>{{$comment->id}}</td>
                   <td>{{$comment->user->name}}</td>
                   <td>{{$comment->body}}</td>
                   <td><a href="{{route('home.post', $comment->post->slug)}}">View post</a></td>
                   <td><a href="{{route('admin.comments.replies.show', $comment->id)}}">View replies</a></td>

                   <td>

                      @if($comment->is_active == 1)

                        {!! Form::open(['method'=>'patch','action'=>['PostCommentsController@update', $comment->id]]) !!}

                        	<input type="hidden" name="is_active" value="0">
                        	<div class="form-group">

                        	    {!! Form::submit('Dissaprove', ['class'=>'btn btn-primary']) !!}

                        	</div>

                        {!! Form::close() !!}

                      @else

                           {!! Form::open(['method'=>'patch','action'=>['PostCommentsController@update', $comment->id]]) !!}

                           <input type="hidden" name="is_active" value="1">
                           <div class="form-group">

                               {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}

                           </div>

                           {!! Form::close() !!}

                      @endif

                   </td>
                   <td>
                       {!! Form::open(['method'=>'delete','action'=>['PostCommentsController@destroy', $comment->id]]) !!}

                       <div class="form-group">

                           {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                       </div>

                       {!! Form::close() !!}
                   </td>
                 </tr>

             @endforeach

           @else

               <h1 class="text-center">No comments</h1>

           @endif

      </tbody>
    </table>



@stop