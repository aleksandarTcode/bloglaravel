<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(Post $post)
    {

//        dd($post);
        auth()->user()->following()->attach($post->author->id);

        return back();

    }

    public function destroy(Post $post){

        $record = Follow::where('follower_id', auth()->user()->id)
            ->where('author_id', $post->author->id)
            ->first();

        // Delete the record if it exists
        if ($record) {
            $record->delete();
        }

        // Redirect back to the previous page
        return back();

    }
}
