<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            Add new post
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

    <div class="m-auto pt-20">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input
                type="text"
                name="title"
                placeholder="Title..."
                class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <textarea
                name="body"
                placeholder="Body..."
                class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">

            </textarea>
            @error('body')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror


            category: <select name="category_id[]" id="category_id[]" multiple>
                @foreach($categories as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                @endforeach
            </select>
            <BR><BR><BR>
            author: <select name="author_id" id="author_id" >
                @foreach($authors as $author)
                    <option value={{$author->id}}>{{$author->name}}</option>
                @endforeach
            </select>

            <BR><BR><BR>

            <button
                type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Submit Post
            </button>

            {{ $errors }}
        </form>
    </div>
</body>
</html>
