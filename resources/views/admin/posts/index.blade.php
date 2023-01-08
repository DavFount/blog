<x-layout>
    <x-setting heading="Manage Posts">
        <table class="min-w-full border-separate" style="border-spacing: 0">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                    Author
                </th>
                <th scope="col"
                    class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">
                    Title
                </th>
                <th scope="col"
                    class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">
                    Excerpt
                </th>
                <th scope="col"
                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                    Category
                </th>
                <th scope="col"
                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                    Published
                </th>
                <th scope="col"
                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pr-4 pl-3 backdrop-blur backdrop-filter sm:pr-6 lg:pr-8">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col"
                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pr-4 pl-3 backdrop-blur backdrop-filter sm:pr-6 lg:pr-8">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach($posts as $post)
                <tr>
                    <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                     src="https://i.pravatar.cc/100?u={{ $post->author->email }}"
                                     alt="">
                            </div>
                            <div class="ml-4">
                                <div class="font-medium text-gray-900">{{ $post->author->name }}</div>
                                <div class="text-gray-500">{{ $post->author->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden sm:table-cell">
                        <a href="/posts/{{ $post->slug }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
                    </td>
                    <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">
                        <a href="/posts/{{ $post->slug }}" class="text-blue-500 hover:underline">{{ substr($post->excerpt, 0, 25) }}</a>
                    </td>
                    <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">
                        <a href="/?category={{ $post->category->slug }}" class="text-blue-500 hover:underline">{{ $post->category->name }}</a>
                    </td>
                    <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">
                        @php
                            $classes = 'p-1 text-white rounded-md';
                            if ($post->published_at)
                                $classes .= ' bg-green-500';
                            else
                                $classes .= ' bg-red-500';
                        @endphp
                        <span class="{{ $classes }}">{{ $post->published_at ? 'Published' : 'Not Published' }}</span>
                    </td>
                    <td class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                        <a href="/admin/posts/{{$post->id}}/edit" class="text-blue-500 hover:text-blue-700">Edit</a>
                    </td>
                    <td class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                        <form method="POST" action="/admin/posts/{{ $post->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-gray-400">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $posts->links() }}
        </div>

        <x-speed-dial>
            <x-speed-dial-item icon="add" tooltip="Add" href="/admin/posts/create"/>
        </x-speed-dial>
    </x-setting>
</x-layout>
