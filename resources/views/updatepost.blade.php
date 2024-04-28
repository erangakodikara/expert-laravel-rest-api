<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1>Posts</h1>
            <div class="row">
                <div class="col-md-12">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="/updatepost">
                        {{csrf_field()}}
                        <input type="hidden" class="form-control" name="id" value="{{$post->id}}">
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                        <input type="text" class="form-control" name="description" value="{{$post->description}}">
                        <input type="submit" class="btn btn-primary" value="UPDATE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                    </form>
                </div>


            </div>
        </div>
    </div>

</body>

</html>