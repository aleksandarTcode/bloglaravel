<?php

namespace App\Http\Controllers;

use App\Mail\FollowAuthorMail;
use App\Models\Follow;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index',[
            'posts'=>Post::latest()->paginate(8)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = $this->validatePost(new Post());

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post'=>$post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);


        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted!');
    }

    public function updateStatus(Post $post)
    {
        $currentStatus = $post->status;

        $post->status = ($currentStatus == 'draft') ? 'published' : 'draft';

        $post->save();


        try {
            if ($post->status == 'published') {
                $SendEmailsTo = Follow::join('users', 'users.id', '=', 'follows.follower_id')
                    ->where('follows.author_id', '=', $post->author->id)
                    ->select('users.email')
                    ->get()->pluck('email')->toArray();

                foreach ($SendEmailsTo as $email) {
                    Mail::to($email)->send(new FollowAuthorMail($post));
                }
                return back()->with('success', 'Post status updated and emails sent to followers!');

            }
        }catch (\Exception $e)
        {
            return back()->with('success', 'Post status updated, emails weren\'t sent because '.$e->getMessage());
        }

        return back()->with('success', 'Post status updated!');

    }

    public function search()
    {
        $query = request('find');
        $posts = Post::where('title', 'LIKE', '%' . $query . '%')->orwhere('body', 'LIKE', '%' . $query . '%')->orWhereHas('author', function($q) use($query) {
            $q->where('name', 'LIKE', '%' . $query . '%');
        })->paginate(10);


        return view('admin.posts.index', compact('posts'));
    }


    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'user_id' => ['nullable', Rule::exists('users', 'id')],
        ]);
    }

}
