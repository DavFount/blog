<x-layout>
    <x-setting heading="Manage Posts">
        <table class="min-w-full border-separate" style="border-spacing: 0">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                    Name
                </th>
                <th scope="col"
                    class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">
                    Slug
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
            @foreach($categories as $category)
                <tr>
                    <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">
                        {{ substr($category->name, 0, 25) }}
                    </td>
                    <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">
                        {{ $category->slug }}
                    </td>
                    <td class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                        <a href="/admin/categories/{{$category->id}}/edit" class="text-blue-500 hover:text-blue-700">Edit</a>
                    </td>
                    <td class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                        <form method="POST" action="/admin/categories/{{ $category->id }}">
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
            {{ $categories->links() }}
        </div>

        <x-speed-dial>
            <x-speed-dial-item icon="add" tooltip="Add" href="/admin/categories/create"/>
        </x-speed-dial>
    </x-setting>
</x-layout>
