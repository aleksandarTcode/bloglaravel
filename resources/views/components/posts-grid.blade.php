@props(['posts','bookmarks'])

<x-post-featured-card :post="$posts[0]" :bookmarks="$bookmarks" />

@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
            <x-post-card
                :post="$post"
                :bookmarks="$bookmarks"
                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
            />
        @endforeach
    </div>
@endif
