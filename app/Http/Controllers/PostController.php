<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show($id)
    {
        $post=Post::find($id);
        return view('post.show',['post'=>$post]);
    }
    public function create()
    {
        $categories=Category::orderBy('id')->get();
        $authors=Author::orderBy('id')->get();
        return view('post.create',['categories'=>$categories,'authors'=>$authors]);
    }

    public function store(PostRequest $request)
    {
//        dd($request->author_id);
        $post=Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'author_id'=>$request->author_id,
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        foreach ($request->category_id as $category_id)
        {
            $category=Category::find($category_id);
            $post->categories()->attach($category_id,[
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
        return redirect()->route('post.index');
    }

    public function index()
    {
        $posts=Post::where('status','enable')->orderBy('id')->get();
        return view('post.index',['posts'=>$posts]);
    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->categories()->detach();
        $post->update(['status'=>'disable']);
        return back();
    }

    public function edit($id)
    {
        $post=Post::find($id);
        return view('post.edit',['post'=>$post]);
    }

    public function update(PostRequest $request,$id)
    {
        Post::find($id)->update([
           'title'=>$request->title,
           'body'=>$request->body,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('post.index');
    }
}
