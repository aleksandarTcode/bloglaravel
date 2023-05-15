<x-layout>
    <x-setting :heading="'Edit Account: ' . $user->name">
        <form method="POST" action="/account/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="username" :value="old('title', $user->username)" />


            <div>
                <x-form.input name="avatar" type="file" :value="old('avatar', $user->avatar)" />

                @if (strpos($user->avatar, 'http') === 0)
                    <img src="{{ $user->avatar }}" width="100px" alt="User avatar" class="rounded-xl mt-4">
                @else
                    <img src="{{ asset('storage/'. $user->avatar) }}" width="100px" alt="User avatar" class="rounded-xl mt-4">
                @endif

            </div>


            <x-form.button>Update</x-form.button>

        </form>
    </x-setting>

</x-layout>
