@props([
    'size' => null,
    'rows' => '3',
    'resize' => null,
    'value' => null
])

@php
    $input = fn\cva(
        [],
        [
            'variants' => [
                'size' => [
                    'default' => 'px-4 py-2 ',
                    'sm' => 'px-3 text-xs',
                    'lg' => 'px-5',
                    'xl' => 'px-6 text-xl',
                ],
            ],
            'defaultVariants' => [
                'size' => 'default',
            ],
        ],
    );

    $resizeCva = fn\cva(
        [],
        [
            'variants' => [
                'resize' => [
                    'none' => 'resize-none',
                    'vertical' => 'resize-y',
                    'horizontal' => 'resize-x',
                    'both' => 'resize',
                ],
            ],
            'defaultVariants' => [
                'resize' => 'vertical',
            ],
        ],
    );
@endphp


<textarea rows="{{ $rows }}"
    {{ $attributes->class([
        'flex w-full rounded-md bg-transparent text-sm transition-colors ',
        'placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring',
        'border border-input',
        'disabled:!cursor-not-allowed disabled:opacity-50 disabled:border disabled:shadow-sm disabled:border-input' => $attributes->get(
            'disabled',
        ),
        'read-only:bg-zinc-800/5 read-only:shadow-none' => $attributes->get('readonly'),
        'border-red-600' => $attributes->get('invalid'),
        $input([
            'size' => $size,
        ]),
        $resizeCva([
            'resize' => $resize,
        ]),
    ]) }}
    {{ $attributes->except(['class']) }}>{{ $value ?: $slot }}</textarea>