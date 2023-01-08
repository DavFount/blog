<x-layout>
    <x-setting :heading="'Edit: ' . $post->title">
        <form action="/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <x-form.input name="title" :value="old('title', $post->title)"/>

            <x-form.input name="slug" :value="old('slug', $post->slug)"/>

            <div class="inline-flex mt-6">
                @if($post->thumbnail)
                    <img class="mr-5 border border-gray-600" src="{{  asset('storage/' . $post->thumbnail) }}" width="100" height="100"/>
                @endif
                <x-form.input name="thumbnail" type="file"/>
            </div>

            <x-form.textarea name="excerpt">{{  old('excerpt', $post->excerpt )}}</x-form.textarea>

            <x-form.textarea name="body" :value="$post->body">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>
                <select name="category_id" id="category" class="bg-white">
                    @foreach(App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            class="hover:bg-gray-100"
                            @if(old('$category_id'))
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            @else
                                {{ $post->category->id == $category->id ? 'selected' : '' }}
                            @endif
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id"/>
            </x-form.field>

            <x-form.checkbox name="publish" :checked="$post->published_at"/>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
