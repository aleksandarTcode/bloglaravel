@props(['post'])

<div class="mt-6 col-span-4">
    <h3 class="font-bold text-lg">Tags:</h3>
    <div class="flex flex-wrap mt-2">
        @foreach (explode(',', $post->tags) as $tag)
            <a href="/?tag={{ trim($tag) }}" class="px-2 py-1 mr-2 mb-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 hover:text-gray-800">{{ $tag }}</a>
        @endforeach
    </div>
</div>
