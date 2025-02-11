@props([
    'inset' => false,
])

<li {{ $attributes->class(['px-2 py-1.5 text-sm font-semibold', 'pl-8' => $inset]) }} {{$attributes->except(['class'])}}>
    {{ $slot }}
</li>