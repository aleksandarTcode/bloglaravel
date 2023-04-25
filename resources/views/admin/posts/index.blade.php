<x-layout>
    <x-setting heading="Manage Posts">


        <form action="/admin/posts/search">
            <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                <div class="absolute top-4 left-3">
                    <i
                        class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                    ></i>
                </div>
                <input
                    type="text"
                    name="query"
                    class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                    placeholder="Find Post..."
                    value="{{ request('query') }}"
                />
                <div class="absolute top-2 right-2">
                    <button
                        type="submit"
                        class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                    >
                        Search
                    </button>
                </div>
            </div>
        </form>

        <div id="search-results"></div>


        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">

                            @if($posts->count())
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/posts/{{ $post->slug }}">
                                                    {{ $post->title }} <i>by {{ $post->author->name }}</i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/admin/posts/{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-xs text-red-400">Delete</button>
                                        </form>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/admin/posts/status/{{ $post->id }}">
                                            @csrf
                                            @method('PATCH')

                                            <button class="text-xs text-gray-400">Change Status from <strong>{{ $post->status }}</strong></button>
                                        </form>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <p>{{ $post->views }} views</p>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                            @else
                                <p class="text-center">No posts here. </p>

                            @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">{{ $posts->links() }}</div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
