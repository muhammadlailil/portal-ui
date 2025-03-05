@props(['value'])
<div class="relative">
    <button type="button" aria-label="option"
        {{ $attributes->merge(['class' => 'flex gap-2 w-full text-start hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground px-2 py-1.5 text-sm rounded-md']) }}
        x-on:click="selectItem($el)" x-init="addItem($el)"
        x-show="filtered.find((row)=>row.value=='{{ $value }}')" data-value="{{ $value }}">
        {{ $slot }}
    </button>
    <x-tabler-check x-cloak x-show="value=='{{ $value }}'" class="h-4 w-4 absolute right-3 top-2" />
</div>
