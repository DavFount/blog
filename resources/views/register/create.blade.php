<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>
                <form action="/register" method="post">
                    @csrf

                    <x-form.input name="name" autocomplete="name" :value="old('name')"/>
                    <x-form.input name="username" :value="old('username')"/>
                    <x-form.input name="email" type="email" autocomplete="username" :value="old('email')"/>
                    <x-form.input name="password" type="password" autocomplete="new-password"/>
                    <x-form.button>Register</x-form.button>

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
