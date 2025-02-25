@props([
    'align' => 'center',
    'side' => 'bottom',
    'offset' => 0,
])
@php
    $alignment = $side . ['center' => '', 'end' => '-end', 'start' => '-start'][$align];
    $sideOffset = $offset ? '.offset.' . $offset : '.offset.6';
@endphp
<div x-ref="popoverContent" x-show="open" x-cloak x-anchor.{{ $alignment }}{{ $sideOffset }}="$refs.triggerPopover"
    x-on:click.outside="close($refs.triggerPopover)" x-transition:enter.origin.top.right
    {{ $attributes->merge(['class' => 'absolute z-50 p-4 overflow-hidden rounded-md border bg-popover text-popover-foreground shadow-md']) }}>
    {{ $slot }}
</div>
