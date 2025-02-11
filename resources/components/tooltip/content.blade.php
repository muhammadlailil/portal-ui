@aware([
    'delay' => 200,
])

@props([
    'align' => 'center',
    'side' => 'bottom',
    'offset' => 0,
])
@php
    $alignment = $side . ['center' => '', 'end' => '-end', 'start' => '-start'][$align];
    $sideOffset = $offset ? '.offset.' . $offset : '.offset.6';
@endphp

<div x-cloak x-show="open" x-transition:enter.delay.{{ $delay }}
    x-anchor.{{ $alignment }}{{ $sideOffset }}="$refs.tooltipTrigger"
    {{ $attributes->merge(['class' => 'z-50 overflow-hidden rounded-md bg-primary px-3 py-1.5 text-xs text-primary-foreground w-fit absolute']) }}>
    {{ $slot }}
</div>
