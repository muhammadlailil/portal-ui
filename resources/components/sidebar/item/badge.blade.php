@props(['label'])
<div
    {{ $attributes->merge(['class' => 'inline-flex items-center border font-semibold bg-primary text-primary-foreground shadow rounded-full px-1 py-0 text-xs']) }}>
    {{ $label }}
</div>
