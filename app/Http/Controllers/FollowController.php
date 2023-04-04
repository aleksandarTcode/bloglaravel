<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Post;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(Post $post)
    {

//        dd($post);
        auth()->user()->following()->attach($post->author->id);

        return back();

    }

    public function destroy(Post $post){


        $record = Follower::where('follower_id', auth()->user())
            ->where('author_id', $post->author)
            ->first();

        // Delete the record if it exists
        if ($record) {
            $record->delete();
        }

        // Redirect back to the previous page
        return back();

    }
}
