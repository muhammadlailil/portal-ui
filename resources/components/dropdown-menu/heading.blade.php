@props([
    'inset' => false,
])

<li {{ $attributes->class(['px-2 py-1.5 text-xs font-medium text-zinc-500', 'pl-8' => $inset]) }} {{$attributes->except(['class'])}}>
    {{ $slot }}
</li>