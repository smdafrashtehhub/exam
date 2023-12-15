
<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    <title>
        Laravel App
    </title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.rtl.min.css">
    <link
        rel="stylesheet"
        href="{{ asset('css/app.css') }}"
    >
</head>
<body class="w-full h-full bg-gray-100">
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            All Articles
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

    <div class="py-10 sm:py-20">
        <a href="{{route('post.create')}}" class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400">
            New Article
        </a>
    </div>

</div>

@foreach($author_posts as $author_post)
    <div class="w-4/5 mx-auto pb-10">
        <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
            <div class="w-11/12 mx-auto pb-10">
                <div class="d-flex">
                    <div class="py-10 sm:py-20">
                        <form action="{{route('post.destroy',['id'=>$author_post->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400">حذف</button>
                        </form>
                    </div>
                    <div class="py-10 sm:py-20">
                        <form action="{{route('post.edit',['id'=>$author_post->id])}}" method="get">
                            <button type="submit" class="btn btn-danger inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400">ویرایش</button>
                        </form>
                    </div>
                    <div class="py-10 sm:py-20">
                        <form action="{{route('post.show',['id'=>$author_post->id])}}" method="get">
                            <button type="submit" class="btn btn-danger inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400">نمایش</button>
                        </form>
                    </div>
                </div>

                <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                    <a href="{{--{{route('blog.show' , $post->id)}}--}}">
                        {{$author_post->title}}
                    </a>
                </h2>

                <p class="text-gray-900 text-lg py-8 w-full break-words">
                    {{$author_post->body}}
                </p>

                <span class="text-gray-500 text-sm sm:text-base">
                    Made by:
                        <a href="{{route('post.author',['id'=>$author_post->author->id])}}"
                           class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all">
                            {{$author_post->author->name}}
                        </a>
                    on {{$author_post->created_at}}
                </span>
            </div>
        </div>
    </div>
@endforeach
</body>
</html>
