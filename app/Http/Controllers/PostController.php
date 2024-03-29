<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::latest()->where('status','published')->filter(request(['search', 'category', 'author', 'tag']))->paginate(6)->withQueryString(),
            'bookmarks' => Bookmark::all()
        ]);
    }

    public function show(Post $post)
    {



        if ($post->status == 'draft') {
            abort(404);
        }

        $post->increment('views');

        $bookmarks = Bookmark::all();
        $user = User::find(auth()->id());

        return view('posts.show', compact('post','bookmarks', 'user'));
    }

}
