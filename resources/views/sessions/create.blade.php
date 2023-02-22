<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1> 

                <form method="POST" action="/login" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username"/>
                    <x-form.input name="password" type="password" autocomplete="new-password"/>

                    <x-form.button>Log In</x-form.button>

                    <!-- <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                            email
                        </label>
                        <input class="border border-gray-400 p-2 w-full"
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                >
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                            Password
                        </label>
                        <input class="border border-gray-400 p-2 w-full"
                                type="password"
                                name="password"
                                id="password"
                                required
                                autocomplete="new-password"
                                >
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                            Log In
                        </button>
                    </div> -->

                    <!-- @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs ">{{ $error }}</li>
                        @endforeach

                    </ul>
                    @endif -->
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>     