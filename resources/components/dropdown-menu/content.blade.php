@props([
    'align' => 'start',
    'side' => 'bottom',
    'offset' => 0,
])
@php
    $alignment = $side . ['center' => '', 'end' => '-end', 'start' => '-start'][$align];
    $sideOffset = $offset ? '.offset.' . $offset : '.offset.6';
@endphp
<ul  x-transition:enter.origin.top.right x-cloak x-show="menuOpen"
    x-anchor.{{ $alignment }}{{ $sideOffset }}="$refs.dropdownTrigger" x-on:click.away="menuOpen=false"
    {{ $attributes->merge(['class' => 'z-50 min-w-[8rem] rounded-md border bg-popover p-1 text-popover-foreground shadow-md absolute']) }}>
    {{ $slot }}
</ul>
