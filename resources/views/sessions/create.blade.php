<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In!</h1>
            <form action="/sessions" method="post">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase front-bold text-xs text-gray-700">E-Mail</label>
                    <input type="email" id="email" name="email" class="border border-gray-400 p-2 w-full">

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase front-bold text-xs text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="border border-gray-400 p-2 w-full">

                    @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Log In
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
