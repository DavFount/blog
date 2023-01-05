<x-dropdown>
    <x-slot:trigger>
        <button
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex bg-gray-200 rounded-xl">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
            <x-icon name="down-arrow" class=" absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot:trigger>
    <x-dropdown-item href="/" :active="request('category') === null">All</x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item href="/?category={{  $category->slug }}&{{ http_build_query(request()->except('category')) }}"
                         :active="request('category') === $category->slug">
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
