@props([
    'disabled' => false,
    'inset' => false,
    'variant' => null,
    'as' => 'div'
])
@php
    $variantColor = fn\cva(
        [],
        [
            'variants' => [
                'variant' => [
                    'default' => '',
                    'danger' => 'hover:text-red-600 hover:bg-red-50 focus:text-red-600 focus:bg-red-50',
                    'red' => 'hover:text-red-700 hover:bg-red-200',
                    'orange' => 'hover:text-orange-700 hover:bg-orange-200',
                    'amber' => 'hover:text-amber-700 hover:bg-amber-200',
                    'yellow' => 'hover:text-yellow-700 hover:bg-yellow-200',
                    'lime' => 'hover:text-lime-700 hover:bg-lime-200',
                    'green' => 'hover:text-green-700 hover:bg-green-200',
                    'emerald' => 'hover:text-emerald-700 hover:bg-emerald-200 ',
                    'teal' => 'hover:text-teal-700 hover:bg-teal-200',
                    'cyan' => 'hover:text-cyan-700 hover:bg-cyan-200',
                    'sky' => 'hover:text-sky-700 hover:bg-sky-200',
                    'blue' => 'hover:text-blue-700 hover:bg-blue-200',
                    'indigo' => 'hover:text-indigo-700 hover:bg-indigo-200',
                    'violet' => 'hover:text-violet-700 hover:bg-violet-200',
                    'purple' => 'hover:text-purple-700 hover:bg-purple-200',
                    'fuchsia' => 'hover:text-fuchsia-700 hover:bg-fuchsia-200',
                    'pink' => 'hover:text-pink-700 hover:bg-pink-200',
                    'rose' => 'hover:text-rose-700 hover:bg-rose-200',
                ],
            ],
            'defaultVariants' => [
                'variant' => 'default',
            ],
        ],
    );
@endphp

<li role="menuitem" aria-disabled="{{ $disabled ? 'true' : 'false' }}" tabindex="-1">
    <{{$as}} {{ $attributes->class([
        'hover:bg-accent hover:text-accent-foreground focus:bg-accent cursor-pointer focus:text-accent-foreground dropdown-item flex gap-2',
        'relative flex w-full cursor-default items-center',
        $variantColor(['variant' => $variant]),
        'rounded-sm px-2 py-1.5 text-sm outline-none transition-colors',
        'opacity-50 !cursor-not-allowed select-none' => $disabled,
        'pl-8' => $inset,
    ]) }}
        {{ $attributes->when($disabled, function ($attributes) {
                return $attributes->except(['x-on:click']);
            })->except(['class']) }}>
        {{ $slot }}
    </{{$as}}>
</li>
<span class="space-x-2"></span>