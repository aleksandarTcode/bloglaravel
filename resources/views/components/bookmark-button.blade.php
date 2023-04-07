@props(['post','bookmarks'])

@auth

@if($bookmarks->where('user_id', auth()->id())->where('post_id', $post->id)->first())
    <div class="flex-shrink-0">
        <form action="/bookmark/{{ $post->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"><i class="fa-solid fa-lg fa-bookmark text-gray-600 hover:text-gray-800 cursor-pointer" title="Unbookmark this post"></i>
            </button>
        </form>
    </div>

    @else
    <div class="flex-shrink-0">
        <form action="/bookmark/{{ $post->id }}" method="POST">
            @csrf
            <button type="submit"><i class="fa-regular fa-lg fa-bookmark text-gray-600 hover:text-gray-800 cursor-pointer" title="Bookmark this post"></i>
            </button>
        </form>
    </div>

@endif






    @endauth
