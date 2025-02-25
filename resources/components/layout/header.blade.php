<header
    {{ $attributes->merge(['class' => 'flex h-16 shrink-0 items-center z-10 gap-2 transition-[height,padding] ease-linear group-has-[[data-state=collapsed]]/sidebar-wrapper:h-12 sticky top-0 bg-background']) }}>
    <div class="flex items-center gap-2 px-4 w-full">
        {{ $slot }}
    </div>
</header>
