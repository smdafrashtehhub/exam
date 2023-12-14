<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('post.update',['id'=>$post->id])}}" method="post">
    @csrf
    @method('put')
    title: <input type="text" name="title" value="{{$post->title}}"><br><br>

    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    body: <textarea
        name="body"
        placeholder="Body..."
        class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">
        {{$post->body}}
            </textarea>

    @error('description')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <button type="submit">send</button>
</form>
</body>
</html>
