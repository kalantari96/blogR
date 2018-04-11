<html>
<head>
    <title>from 1</title>
    <link href="/css/222bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/blog-home.css" rel="stylesheet">
    <link href="/css/bootstrap-select.min.css" rel="stylesheet">
</head>
<body>

<div class="col-12 col-md-9 pull-md-3 bd-content">
    <div class="col-md-18" data-example-id="">
        @include('errors')
        <form method="post" action="{{route('Posted')}}">
            {{csrf_field()}}

            <div class="form-group">
                <label >Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter your title">
            </div>


            <div class="form-group">
                <label for="exampleTextarea">Share your post</label>
                <textarea class="form-control" id="desc" name="desc" placeholder="Enter your post" rows="3"></textarea>
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
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap-select.min.js"></script>

<script>
    $('#tag').selectpicker();
</script>
</body>
</html>