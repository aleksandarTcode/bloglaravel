<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store(Post $post)
    {

        $attributes['user_id'] = auth()->id();
        $attributes['post_id'] = $post->id;

        Bookmark::create($attributes);

        return back()->with('success', 'You have bookmarked post '.$post->title.'!');

    }

    public function destroy(Post $post)
    {
        $record = Bookmark::where('user_id', auth()->id())
            ->where('post_id', $post->id)
            ->first();

        // Delete the record if it exists
        if ($record) {
            $record->delete();
        }

        // Redirect back to the previous page
        return back()->with('success', 'You have unbookmarked post '.$post->title.'!');
    }
}
