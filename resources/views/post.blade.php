@extends('layouts.blog-post')




@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>

    <hr>

    @if(Session::has('created_comment'))

        <p class="bg-success">{{session('created_comment')}}</p>

    @endif

    <!-- Blog Comments -->

    @if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

        	<div class="form-group">

        		{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}

        	</div>
        	<div class="form-group">

        	    {!! Form::submit('Comment', ['class'=>'btn btn-primary']) !!}

        	</div>

        {!! Form::close() !!}

    </div>

    @endif

    <hr>

    <!-- Posted Comments -->

    @if($comments)

        @foreach($comments as $comment)

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="{{$comment->user->photo ? $comment->user->photo->file : '/profile.png'}}" alt="" height="64">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->user->name}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            <p>{{$comment->body}}</p>

            @if(Auth::check())

                <button class="toggle-reply btn btn-primary pull-right">Reply</button>

            @endif

            @if($comment->replies)

                @foreach($comment->replies as $reply)

                    @if($reply->is_active == 1)

                <!-- Nested Comment -->
                    <div id="nested-comment" class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{$reply->user->photo ? $reply->user->photo->file : '/profile.png'}}" alt="" height="64">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->user->name}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                             {{$reply->body}}
                        </div>

                      <div class="comment-reply-container">


                        <div class="comment-reply col-sm-6">

                            {!! Form::open(['action'=>'CommentRepliesController@createReply']) !!}

                                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                <div class="form-group">

                                    {!! Form::label('body', 'Reply:') !!}
                                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2]) !!}

                                </div>
                                <div class="form-group">

                                    {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}

                                </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                    <!-- End Nested Comment -->
                   </div>
                   @endif
                @endforeach
            @endif
        </div>
    </div>

        @endforeach

    @endif


@stop

@section('categories')

    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">

                @if($categories)

                    @foreach($categories as $category)

                        <li><a href="#">{{$category->name}}</a>
                        </li>

                    @endforeach

                @endif
            </ul>
        </div>
        {{--<div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div>--}}
    </div>







@stop

@section('scripts')

    <script>

        $('.toggle-reply').click(function(){

            $(this).next().slideToggle("fast");


        });



    </script>





@stop