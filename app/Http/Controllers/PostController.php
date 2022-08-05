<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::query()
            ->with(['user'])
            ->orderByDesc('updated_at')
            ->get();

        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post
        ]);
    }
}
