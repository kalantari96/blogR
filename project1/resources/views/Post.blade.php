<html>
<head>
    <title>from 1</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="col-12 col-md-9 pull-md-3 bd-content">
    <div class="col-md-18" data-example-id="">
        <form method="post" action="{{route('Posted')}}">
            {{csrf_field()}}



            <div class="form-group">
                <label for="exampleTextarea">S
                    hare Your Post</label>
                <textarea class="form-control" id="dec" name="dec" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</div>
</body>
</html>