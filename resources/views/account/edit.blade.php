<x-layout>
    <x-setting :heading="'Edit Account: ' . $user->name">
        <form method="POST" action="/account/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="username" :value="old('title', $user->username)" />


            <div>
                <x-form.input name="avatar" type="file" :value="old('avatar', $user->avatar)" />

                <x-user-avatar :src="$user->avatar" width="100px" />


            </div>


            <x-form.button>Update</x-form.button>

        </form>
    </x-setting>

</x-layout>
