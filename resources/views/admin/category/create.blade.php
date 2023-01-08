<x-layout>
    <x-setting heading="Publish New Post!">
        <form action="/admin/categories" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input name="name" :value="old('name')"/>

            <x-form.input name="slug" :value="old('slug')"/>

            <x-form.button>Submit</x-form.button>
        </form>
    </x-setting>
</x-layout>
