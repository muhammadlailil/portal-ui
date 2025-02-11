@props([
    'align' => 'start',
    'side' => 'bottom',
    'offset' => 0,
])
@php
    $alignment = $side . ['center' => '', 'end' => '-end', 'start' => '-start'][$align];
    $sideOffset = $offset ? '.offset.' . $offset : '.offset.6';
@endphp
<div
    x-hover-card:content
    x-transition.delay.200ms
    x-anchor.{{ $alignment }}{{ $sideOffset }}="$refs.hoverCardTrigger"
    x-cloak
    x-show="hoverCard"
    x-on:mouseleave="hoverCard=false"
    {{ $attributes->merge(['class'=>'w-64 rounded-md border bg-popover p-4 text-popover-foreground shadow-md outline-none absolute']) }}
>
    {{ $slot }}
</div>