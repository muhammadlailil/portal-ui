<li>
    <a
        {{ $attributes->merge(['class' => 'flex gap-3 items-center px-2 py-2 rounded-md text-sm text-accent-foreground hover:bg-accent']) }}>
        {{ $slot }}
    </a>
</li>
