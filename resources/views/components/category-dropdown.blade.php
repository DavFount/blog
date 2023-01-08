<x-dropdown>
    <x-slot:trigger>
        <button
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex bg-gray-100 rounded-xl">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
            <x-icon name="arrow" class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot:trigger>
    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}"
                     :active="request('category') === null">All
    </x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item
            href="/?category={{  $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="request('category') === $category->slug">
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
