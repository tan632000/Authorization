<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->paginate();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->only('title', 'body');
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::user()->id;
        $post = Post::create($data);
        return redirect()->route('list_drafts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        $data = $request->only('title', 'body');
        $data['slug'] = Str::slug($data['title']);
        $post->fill($data)->save();
        return redirect()->route('list_drafts');
    }

    public function show($id)
    {
        $post = Post::published()->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function publish(Post $post)
    {
        $post->published = true;
        $post->save();
        return back();
    }

    public function drafts()
    {
        $postsQuery = Post::unpublished();
        if(Gate::denies('post.draft')) {
            $postsQuery = $postsQuery->where('user_id', FacadesAuth::user()->id);
        }
        $posts = $postsQuery->paginate();
        return view('posts.drafts', compact('posts'));
    }
}