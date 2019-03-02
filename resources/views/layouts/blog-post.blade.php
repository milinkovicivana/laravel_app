<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/libs/blog-post.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/metisMenu.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/sb-admin-2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
@include('includes.home_nav')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            @yield('content')

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                @yield('categories')
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

@include('includes.home_footer')

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('js/libs/jquery.js')}}"></script>
<script src="{{asset('js/libs/bootstrap.js')}}"></script>
<script src="{{asset('js/libs/metisMenu.js')}}"></script>
<script src="{{asset('js/libs/sb-admin-2.js')}}"></script>
<script src="{{asset('js/libs/scripts.js')}}"></script>

@yield('scripts')

</body>

</html>
