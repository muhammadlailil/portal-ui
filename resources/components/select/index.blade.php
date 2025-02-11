@props([
    'size' => null,
    'rows' => '3',
    'resize' => null,
    'value' => null,
])

@php
    $input = fn\cva(
        [],
        [
            'variants' => [
                'size' => [
                    'default' => 'h-10 px-4 py-2 ',
                    'sm' => 'h-8 px-3 text-xs',
                    'lg' => 'h-12 px-5',
                    'xl' => 'h-13 px-6 text-xl',
                ],
            ],
            'defaultVariants' => [
                'size' => 'default',
            ],
        ],
    );

    $icons = fn\cva(
        [],
        [
            'variants' => [
                'size' => [
                    'default' => 'w-10 p-[12px] right-0',
                    'sm' => 'w-7 p-2 right-0',
                    'lg' => 'w-11 p-3 right-0',
                    'xl' => 'w-13 p-2 right-0',
                ],
            ],
            'defaultVariants' => [
                'size' => 'default',
            ],
        ],
    );

    $iconSize =  $size ?? 'default';
@endphp


<div x-data class="relative w-full">
     <div
         class="absolute hover:bg-accent pointer-events-none select-none m-1 h-[85%] text-zinc-400 flex items-center justify-center rounded-sm {{ $icons(['size' => $iconSize]) }}">
         <x-portal::icon.up-down />
     </div>
    <select
        {{ $attributes->class([
            'flex w-full rounded-md text-sm transition-colors bg-background',
            'placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring',
            'border border-input',
            'disabled:!cursor-not-allowed bg-zinc-800/20 border-none opacity-50 !shadow-none' => $attributes->get('disabled'),
            'border-red-600' => $attributes->get('invalid'),
            $input([
                'size' => $size,
            ]),
        ]) }}
        {{ $attributes->except(['class']) }}>
        {{ $slot }}
    </select>
</div>
