<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
<div class="w-4/5 mx-auto">
<form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    title: <input class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" type="text" name="title" value="{{$post->title}}"><br><br>

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
    category: <select class="bg-transparent block border-b-2  h-40  text-xl outline-none" name="category_id[]" id="category_id[]" multiple>
        @foreach($categories as $category)
            <option value={{$category->id}}
            @foreach($post->categories as $newcategory)
            @if($newcategory->id == $category->id)
                selected
                @endif
            @endforeach>
                {{$category->name}}

            </option>
        @endforeach
    </select>
    <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
        send</button>
</form>
    </div>
</body>
</html>
