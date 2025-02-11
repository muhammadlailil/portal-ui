@props(['icon' => 'minus'])
<div {{ $attributes->merge(['class' => 'px-2']) }}>
    @svg('tabler-' . $icon, [
        'class' => 'h-4',
    ])
</div>
