<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::latest()->where('status','published')->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {

        if ($post->status == 'draft') {
            abort(404);
        }

        $post->increment('views');

        return view('posts.show', compact('post'));
    }

}
