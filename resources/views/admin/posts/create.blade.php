<x-layout>
    <x-setting heading="Publish New Post!">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" :value="old('title')"/>

            <x-form.input name="slug" :value="old('slug')"/>

            <x-form.input name="thumbnail" type="file" :value="old('thumbnail')"/>

            <x-form.textarea name="excerpt">{{  old('excerpt') }}</x-form.textarea>

            <x-form.textarea name="body">{{ old('body') }}</x-form.textarea>

            <div class="mb-6">
                <x-form.label name="category"/>
                <select name="category_id" id="category" class="bg-white">
                    @foreach(App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            class="hover:bg-gray-100"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id"/>
            </div>

            <x-form.checkbox name="publish"/>

            <x-form.button>Submit</x-form.button>
        </form>
    </x-setting>
</x-layout>
