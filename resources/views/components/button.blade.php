@props(['type' => 'submit', 'variant' => 'primary'])

@php
    $variant = [
        'primary' => 'border-2 border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white ',
        'destroy' => 'border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white ',
        'active-tab' => 'bg-white text-gray-900',
        'inactive-tab' => 'bg-transparent text-gray-900',
        'naked' => 'bg-transparent text-ray-900'
    ][$variant];
@endphp

<button type="{{ $type }}"
    {{ $attributes->merge(['class' => "px-4 py-2 font-medium text-sm w-24 transition duration-150 ease-in-out {$variant}"]) }}>
    {{ $slot }}
</button>
