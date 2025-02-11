@props([
    'variant' => null,
])
@php
    $alert = fn\cva(
        [
            'relative w-full rounded-lg border px-4 py-3 text-sm [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg~*]:pl-7',
        ],
        [
            'variants' => [
                'variant' => [
                    'default' => 'bg-background text-foreground dark:text-white dark:[&>svg]:text-white [&>svg]:text-foreground',
                    'destructive' =>
                        'border-destructive/50 text-destructive dark:border-destructive [&>svg]:text-destructive',
                ],
            ],
            'defaultVariants' => [
                'variant' => 'default',
            ],
        ],
    );
@endphp

<div {{ $attributes->merge(['class' => $alert(['variant' => $variant])]) }}>
    {{ $slot }}
</div>
