@props(['name', 'checked' => false])

<x-form.field>
    <div class="relative flex items-start">
        <div class="flex h-5 items-center">
            <input id="{{$name}}"
                   name="{{$name}}"
                   aria-describedby="{{$name}}"
                   type="checkbox"
                   class="h-4 w-4 rounded border-gray-300 text-blue-500 focus:ring-blue-600"
                   {{ $checked ? 'checked' : '' }}
            >
        </div>
        <div class="ml-3 text-sm">
            <x-form.label :name="$name" />
        </div>
    </div>
</x-form.field>
