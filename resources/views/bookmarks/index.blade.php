<x-layout>
    <x-setting heading="Manage Bookmarks">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($bookmarks_for_user as $bookmark)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="flex items-center justify-between space-x-2">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/posts/{{ $bookmark->post->slug }}">
                                                    {{ $bookmark->post->title }} <i>by {{ $bookmark->post->author->name }}</i>
                                                </a>
                                            </div>

                                            <x-bookmark-button :post="$bookmark->post" :bookmarks="$bookmarks"/>

                                        </div>


{{--                                        <div class="flex items-center justify-between space-x-2 mb-10">--}}
{{--                                            <h1 class="font-bold text-3xl lg:text-4xl">--}}
{{--                                                {{ $post->title }}--}}
{{--                                            </h1>--}}
{{--                                            <x-bookmark-button :post="$post" :bookmarks="$bookmarks"/>--}}
{{--                                        </div>--}}




                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </x-setting>
</x-layout>

