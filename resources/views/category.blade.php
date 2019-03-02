@extends('layouts.blog-home')

@section('content')
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- First Blog Post -->

                @if($posts)

                    @foreach($posts as $post)

                        <h2>
                            {{$post->title}}
                        </h2>
                        <p class="lead">
                            by {{$post->user->name}}
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>
                        <hr>
                        <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'empty-image.png'}}" alt="">
                        <hr>
                        <p> {!! str_limit($post->body, 40) !!} </p>
                        <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                    @endforeach

                @endif

            <!-- Pagination -->

                {{--{{$posts->render()}}--}}


            </div>

            <!-- Blog Sidebar Widgets Column -->
            @include('includes.home_sidebar')

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website {{$year}}</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
@endsection
