@props(['label'])
<li class="border-b last:border-b-0 pb-2">
    <div {{ $attributes->merge(['class' => 'text-accent-foreground text-xs mb-1 ms-2']) }}>{{ $label }}</div>
    <ol>
        {{ $slot }}
    </ol>
</li>
