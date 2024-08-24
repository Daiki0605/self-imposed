<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Category;
use App\Http\Requests\PostRequest; //

class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create(Category $categories)
    {
        return view('posts.create')->with(['categories' => $categories->get()]);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function store(PostRequest $request, post $post)
    {
        $input = $request['post'];
        $input['user_id']=Auth::user()->id;
        $categories=$request['category'];
        $post->fill($input)->save();
        foreach($categories as $category){
            $post->categories()->attach((int)$category);
        }
        return redirect('/posts/' . $post->id);
    }
}
