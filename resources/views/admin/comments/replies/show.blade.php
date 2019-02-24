@extends('layouts.admin')



@section('content')


    @if(count($replies) > 0)

        <h1>Replies</h1>

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

            @foreach($replies as $reply)

                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->user->name}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->slug)}}">View post</a></td>

                    <td>

                        @if($reply->is_active == 1)

                            {!! Form::open(['method'=>'patch','action'=>['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">

                                {!! Form::submit('Dissaprove', ['class'=>'btn btn-primary']) !!}

                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'patch','action'=>['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">

                                {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}

                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>
                        {!! Form::open(['method'=>'delete','action'=>['CommentRepliesController@destroy', $reply->id]]) !!}

                        <div class="form-group">

                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach

            @else

                <h1 class="text-center">No replies</h1>

            @endif

            </tbody>
        </table>



@stop