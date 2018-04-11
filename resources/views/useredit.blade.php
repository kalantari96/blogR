<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/css/222bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/blog-home.css" rel="stylesheet">
    <link href="/css/bootstrap-select.min.css" rel="stylesheet">



</head>

<body>

<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8" style="font-size: 20px;">

            <form method="post" action="/Update/{{$post->id}}" >
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value={{$post->title}} />
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" name="description">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select name="category" class="form-control" id="category" >

                        @foreach($categories as $id=>$name)
                            <option value="{{$id}}">{{$name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tag">Tags</label>
                    <select name="tag[]" class="form-control" id="tag" multiple>
                        @foreach( $tags as $id=>$name )
                            <option value="{{ $id }}"> {{$name}} </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>






        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->


<!-- Bootstrap core JavaScript -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap-select.min.js"></script>

<script>
    $('#tag').selectpicker();
</script>

</body>

</html>




