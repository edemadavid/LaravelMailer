<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>



<div class="container">
    <h3 class="my-3">Email Preview</h3>

    <iframe src="{{route('show', $id)}}" width="100%" height="500px"></iframe>

    <a href="{{ route ('send', $id)}}" class="btn btn-success">Send</a>
</div>


</body>
</html>
