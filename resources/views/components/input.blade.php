@props(['type' => 'text', 'name' => ''])

<div>
    <input type="{{ $type }}" name="{{ $name }}"
        {{ $attributes->merge(['class' => 'border border-gray-400 w-full inline-block p-2 text-sm outline-none focus:ring-1 focus:ring-gray-500']) }}>

    @error($name)
        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
    @enderror
</div>
