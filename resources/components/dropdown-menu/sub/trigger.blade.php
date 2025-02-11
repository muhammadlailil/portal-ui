@props([
    'disabled' => false,
    'inset' => false,
])
<div role="menuitem" aria-haspopup="true" aria-disabled="{{ $disabled ? 'true' : 'false' }}" 
    tabindex="-1"
    {{ $attributes->class([
        'hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground',
        'relative flex w-full cursor-default select-none items-center',
        'rounded-sm px-2 py-1.5 text-sm outline-none transition-colors',
        'opacity-50 cursor-not-allowed' => $disabled,
        'pl-8' => $inset,
    ]) }}
    {{ $attributes->except(['x-on:click', '@click', 'wire:click']) }} x-ref="dropdownSubTrigger"
    >
    <span>
        {{ $slot }}
    </span>
    <x-tabler-chevron-right class="ml-auto size-4" />
</div>
