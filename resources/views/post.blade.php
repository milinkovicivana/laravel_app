@extends('layouts.blog-post')


@section('content')

    @if(Session::has('created_comment'))

        <p class="alert alert-success">{{session('created_comment')}}</p>

    @elseif(Session::has('created_reply'))

        <p class="alert alert-success">{{session('created_reply')}}</p>

    @endif


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by {{$post->user->name}}
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : '/empty-image.png'}}" alt="">

    <hr>

    <!-- Post Content -->
    {{--<p>{{$post->body}}</p>--}}
    <p>{!! $post->body !!}</p>

    <hr>


    <!-- Blog Comments -->

    @if(Auth::check() && Auth::user()->is_active == 1)

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

        @if(Auth::user()->isAdmin())

            <input type="hidden" name="is_active" value="1">

        @else

            <input type="hidden" name="is_active" value="0">

        @endif

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

            {{--@if(Auth::check())--}}

                {{--<button class="toggle-reply btn btn-primary pull-right">Reply</button>--}}

            {{--@endif--}}

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

                    <!-- End Nested Comment -->
                   </div>
                   @endif
                @endforeach
            @endif
        </div>
    </div>

    @if(Auth::check() && Auth::user()->is_active == 1)

    <div class="comment-reply-container">


        <div class="comment-reply">

            {!! Form::open(['action'=>'CommentRepliesController@createReply']) !!}

            <input type="hidden" name="comment_id" value="{{$comment->id}}">

            @if(Auth::user()->isAdmin())

                <input type="hidden" name="is_active" value="1">

            @else

                <input type="hidden" name="is_active" value="0">

            @endif

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

    @endif

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

                        <li><a href="{{route('home.category', $category->id)}}">{{$category->name}}</a>
                        </li>

                    @endforeach

                @endif
            </ul>
        </div>

    </div>




@stop


@section('scripts')

    <script>

        $('.toggle-reply').click(function(){

            $('comment-reply').slideToggle("fast");


        });



    </script>





@stop

