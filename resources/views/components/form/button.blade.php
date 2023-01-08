@props(['type' => 'submit'])

<x-form.field>
    <button
        {{ $attributes->merge(['class' => 'bg-blue-400 text-white uppercase font-semibold rounded-xl py-2 px-4 hover:bg-blue-500'])  }} type="{{ $type }}">
        {{ $slot }}
    </button>
</x-form.field>
