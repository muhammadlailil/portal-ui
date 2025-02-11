@props(['variant' => null])
@php
    $tabs = fn\cva(
        ['flex gap-1 h-10 border-zinc-800/10 dark:border-white/20'],
        [
            'variants' => [
                'variant' => [
                    'default' => 'border-b',
                    'segmented' =>
                        "rounded-lg bg-muted p-1  [&>button[active='true']]:bg-background [&>button[active='true']]:border-none [&>button[active='true']]:rounded-md [&>button[active='true']]:shadow-sm",
                ],
            ],
            'defaultVariants' => [
                'variant' => 'default',
            ],
        ],
    );
@endphp
<div {{ $attributes->merge([
    'class' => $tabs([
        'variant' => $variant,
    ]),
]) }}>
    {{ $slot }}
</div>
