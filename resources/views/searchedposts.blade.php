<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-post.css" rel="stylesheet">


</head>

<body>

<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8" style="font-size: 20px;">


            @foreach($posts as $post)
                <p>{{$post->title}}</p>
                <p>{{$post->content}}</p>

                    <hr>

            @endforeach
                @foreach($posts2 as $post2)
                    <p>{{$post2->title}}</p>
                    <p>{{$post2->content}}</p>

                    <hr>

                @endforeach

                @foreach ($category_post as $cat)

                    @foreach ($cat as $post)

                        <p>{{$post->title}}</p>
                        <p>{{$post->content}}</p>

                        <hr>

                    @endforeach
                @endforeach

                @foreach ($tag_post as $tag_post)

                    @foreach ($tag_post as $post)

                        <p>{{$post->title}}</p>
                        <p>{{$post->content}}</p>

                        <hr>

                    @endforeach
                @endforeach


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




