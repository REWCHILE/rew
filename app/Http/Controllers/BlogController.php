<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(6);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $recentPosts = Post::where('id', '!=', $post->id)->where('is_published', true)->latest()->take(3)->get();

        return view('blog.show', compact('post', 'recentPosts'));
    }
}
