<x-layout>
    <section class="px-6 py-8 mt-10">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form method="POST" action="/login" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />

                    <div class="flex items-center justify-between">
                        <div>
                            <x-form.button class="mr-2">Log In</x-form.button>
                        </div>
                        <div class="ml-2 mt-6">
                            <a href="/auth/redirect" class="bg-gray-800 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" viewBox="0 0 16 16" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.49-.94-.84-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.24.82.73 1.21 1.9.87 2.37.66.07-.53.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.58.82-2.14-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.03 2.2-.82 2.2-.82.45 1.1.17 1.92.09 2.12.51.56.82 1.27.82 2.14 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.56.38C13.71 14.53 16 11.53 16 8c0-4.42-3.58-8-8-8z"></path>
                                </svg>
                                Sign in with GitHub
                            </a>
                        </div>
                    </div>

                </form>
            </x-panel>
        </main>

    </section>
</x-layout>
