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
                    <form method="post" action="/savepost">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="title" placeholder="Please enter the post name ">
                        <input type="text" class="form-control" name="description" placeholder="Please enter the post description">
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                    </form>
                </div>
                <div class="col-md-12">

                    <table class="table table-dark">
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                        <th></th>
                        <th></th>
                        @foreach ($posts as $post)
                        <tr>

                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>
                            @if ($post->active)
                            <button class="btn btn-success">ACTIVE</button>
                            @else
                            <button  class="btn btn-warning">INACTIVE</button>
                            @endif
                            </td>
                            <td>
                                <a href="postinactive/{{$post->id}}" class="btn btn-primary">CHANGE STATUS</a>
                            </td>
                            <td>
                                <a href="updatepostview/{{$post->id}}" class="btn btn-danger">UPDATE</a>
                            </td>
                            <td>
                                <a href="deletepost/{{$post->id}}" class="btn btn-warning">DELETE</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>