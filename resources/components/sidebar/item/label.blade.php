<div
    {{ $attributes->merge(['class' => 'px-2 text-xs font-medium text-sidebar-foreground/70 outline-none ring-sidebar-ring py-2 group-data-[state=collapsed]:-mt-8 group-data-[state=collapsed]:opacity-0 transition-[opacity,margin] duration-200']) }}>
    {{ $slot }}
</div>
