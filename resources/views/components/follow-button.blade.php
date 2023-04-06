@props(['post'])
@auth

    @if(auth()->user()->id !== $post->author->id)
        @if(! auth()->user()->following->contains($post->author->id))
            <form action="/author/{{ $post->author->id }}/follow" method="POST">
                @csrf
                <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 mt-2 rounded">
                    Follow
                </button>
            </form>
        @else
            <form action="/author/{{ $post->author->id }}/unfollow" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 mt-2 rounded">
                    Unfollow
                </button>
            </form>
        @endif
    @endif

@endauth
