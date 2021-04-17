<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>SHORT-URL</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Short-URL</a>
            </label>
        </div>

    </nav>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">
                    <div class="d-flex justify-content-between">
                        @if($message = Session::get('success'))
                            <p>{{$message}}</p>
                        @endif
                        <p>Your Quota Remaining {{ 10-count($urls) }}/10</p>
                        <div>
                            <a href="/new" class="btn btn-primary">create</a>
                        </div>
                    </div>
                </h5>
            </div>
            {{--<a href="/new">create</a>--}}
            {{--<p>Your Quota Remaining {{ 10-count($urls) }}/10</p>--}}
            @if(!$urls->isEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>long url</td>
                            <td>short url</td>
                            <td>create</td>
                        </tr>
                    </thead>
                    @foreach($urls as $url)
                        <tr>
                            <td>{{$url->long_url}}</td>
                            <td><a href="/gt/{{$url->short_url}}" target="_blank">{{$url->short_url}}</a></td>
                            <td>{{$url->created_at}}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
