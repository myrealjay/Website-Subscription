<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Created</title>
</head>
<body>
    <h4>Hello {{ $user->name }}</h4>
    <p>A post <b>{{$post->title}}</b> as just been created, find description below</p>
    <h5>Description</5>
    {!! $post->description !!}
</body>
</html>