<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(Post $post)
    {

        auth()->user()->following()->attach($post->author->id);

        return back();

    }
}
