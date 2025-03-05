@props(['label' => ''])
<li class="group/menu-item relative">
    <a
        x-on:mouseover="showTooltip('{{$label}}',$el)"
        x-on:mouseleave="tooltip=false"
        {{ $attributes->merge(['class' => '[&>svg]:shrink-0 cursor-pointer text-sm flex w-full items-center gap-2 overflow-hidden rounded-md p-2 border border-transparent text-left outline-none ring-sidebar-ring hover:bg-sidebar-accent [&>.icon]:h-4.5 [&>.icon]:w-4.5 [&[active]]:bg-background [&[active]]:!border-input']) }}>
        {{ $slot }}
    </a>
</li>
