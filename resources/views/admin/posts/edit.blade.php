<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.input name="slug" :value="old('slug', $post->slug)" />


            <div>
            <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />

            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl mt-4" width="100">
            </div>

            <x-form.input name="tags" :value="old('tags', $post->tags)" placeholder="Comma Separated (e.g.,Laravel, PHP, MySQL, etc)" />

            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            <x-form.field>
                <x-form.label name="author" />

                <select name="user_id" id="user_id">
                    @foreach (\App\Models\User::all() as $user)
                        <option
                            value="{{ $user->id }}"
                            {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}
                        >
                            {{ ucwords($user->name) }}
                        </option>
                    @endforeach
                </select>

                <x-form.error name="author" />
            </x-form.field>

            <x-form.button>Update</x-form.button>

        </form>
    </x-setting>

</x-layout>
