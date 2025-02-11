@props(['href' => null, 'variant' => 'ghost'])
<x-portal::button as="{{ $href ? 'a' : 'button' }}" href="{{ $href }}" disabled="{{ !$href }}"
    variant="{{ $variant }}" {{ $attributes->merge(['class' => '!gap-0 !pe-2']) }}>
    Next
    <x-tabler-chevron-right class="h-4.5" />
</x-portal::button>
