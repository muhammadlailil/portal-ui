@props([
    'level' => null,
    'size' => null,
])

@php
    $button = fn\cva(
        ['font-medium text-zinc-800 dark:text-white'],
        [
            'variants' => [
                'level' => [
                    'default' => '',
                ],
                'size' => [
                    'default' => 'text-sm',
                    'lg' => 'text-base',
                    'xl' => 'text-2xl',
                ],
            ],
            'defaultVariants' => [
                'variant' => 'default',
                'size' => 'default',
            ],
        ],
    );
@endphp

@if ($level)
    <h{{$level}} {{ $attributes->merge(['class' => $button(['level' => $level, 'size' => $size])]) }}>
        {{ $slot }}
    </h{{$level}}>
@else
    <div {{ $attributes->merge(['class' => $button(['level' => $level, 'size' => $size])]) }}>
        {{ $slot }}
    </div>
@endif
