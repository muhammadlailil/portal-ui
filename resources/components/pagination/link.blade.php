@props(['href' => null, 'label' => null, 'active' => false])
@php
    $variant = $active ? 'outline' : 'ghost';
    $href = $active ? '#' : $href;
@endphp
<x-portal::button as="{{ $href ? 'a' : 'button' }}" href="{{ $href }}" disabled="{{ !$href }}"
    {{ $attributes }} variant="{{ $variant }}">
    {{ $label ?: $slot }}
</x-portal::button>
