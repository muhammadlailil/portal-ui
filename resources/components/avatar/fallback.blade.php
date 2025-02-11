<span x-cloak x-show="showFallback"
    {{ $attributes->merge(['class' => 'flex h-full w-full items-center justify-center rounded-full bg-muted']) }}>
    {{ $slot }}
</span>
