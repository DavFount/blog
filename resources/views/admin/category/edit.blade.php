<x-layout>
    <x-setting heading="Publish New Post!">
        <form action="/admin/categories/{{$category->id}}" method="POST">
            @method('PATCH')
            @csrf

            <x-form.input name="name" :value="old('name', $category->name)"/>

            <x-form.input name="slug" :value="old('slug', $category->slug)"/>

            <div class="inline-flex space-x-2">
                <x-form.button>Update</x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>
