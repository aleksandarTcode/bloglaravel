<x-layout>
    <x-setting :heading="'Edit Account: ' . $user->name">
        <form method="POST" action="/account/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="username" :value="old('title', $user->username)" />


            <div>
                <x-form.input name="avatar" type="file" :value="old('avatar', $user->avatar)" />

                <img src="{{ asset('storage/'. $user->avatar) }}" width="100px" alt="User avatar" class="rounded-xl mt-4">
            </div>


            <x-form.button>Update</x-form.button>

        </form>
    </x-setting>

</x-layout>
