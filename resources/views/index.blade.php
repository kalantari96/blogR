<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-post.css" rel="stylesheet">


</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8" style="font-size: 20px;">


                @foreach($posts as $post)
                    <p>{{$post->title}}</p>
                    <p>{{$post->content}}</p>

                    @if(! $loop->last)
                        <hr>
                    @endif
                @endforeach



            <hr>





        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                <form method="post" action="{{route('Searched')}}" >
                    {{csrf_field()}}


                    <div class="input-group">


                                    <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Search</button>
                </span>
                    </div>


                </form>
                </div>

            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <?php
                            $categories=\App\Category::all();
                        ?>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                              @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('category.index' , ['category'=>$category]) }}">{{ $category->name }}</a>
                                    </li>


                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <!--tags widget -->
            <div class="card my-4">
                <h5 class="card-header">tags</h5>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $tags=\App\Tag::all();
                        ?>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @foreach($tags as $tag)
                                    <li>
                                        <a href="{{route('tag.index' , ['tag'=>$tag]) }}">{{ $tag->name }}</a>
                                    </li>


                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Side Widget -->


        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->


<!-- Bootstrap core JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>