<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function authorposts($id)
    {
        $author=Author::find($id);
        $author_posts=$author->posts;
        return view('post.author',['author_posts'=>$author_posts]);
    }
    public function show($id)
    {
        $post=Post::find($id);
        $categories=$post->categories;
        return view('post.show',['post'=>$post,'categories'=>$categories]);
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
            $post->categories()->attach($category,[
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
//        $post->update(['status'=>'disable']);
        $post->delete();
        return back();
    }

    public function edit($id)
    {
        $post=Post::find($id);
        $categories=Category::all();
        return view('post.edit',['post'=>$post,'categories'=>$categories]);
    }

    public function update(PostRequest $request,$id)
    {
        $post=Post::find($id);
        $post->update([
           'title'=>$request->title,
           'body'=>$request->body,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $id=[];
        foreach ($request->category_id as $category_id)
        {
            $id[]=$category_id;
        }
        $post->categories()->sync($id);
        return redirect()->route('post.index');
    }
}
