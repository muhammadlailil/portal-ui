@props([
    'variant' => null,
    'size' => null,
])

@php
    $button = fn\cva(
        [
            'inline-flex items-center gap-1 justify-center whitespace-nowrap rounded-md cursor-pointer text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50',
        ],
        [
            'variants' => [
                'variant' => [
                    'default' => 'bg-primary text-primary-foreground shadow hover:bg-primary/90',
                    'danger' => 'bg-destructive text-destructive-foreground shadow-sm hover:bg-destructive/90',
                    'outline' =>
                        'border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground',
                    'secondary' => 'bg-secondary text-secondary-foreground  hover:bg-secondary/80',
                    'ghost' => 'hover:bg-accent hover:text-accent-foreground',
                    'link' => 'text-primary underline-offset-4 hover:underline dark:text-white',
                ],
                'size' => [
                    'default' => 'h-10 px-4 py-2',
                    'sm' => 'h-8 rounded-md px-3 text-xs',
                    'xs' => 'h-5 px-2 text-xs rounded-md',
                    'lg' => 'h-12 rounded-md px-8',
                    'xl' => 'h-13 rounded-md px-8 text-md',
                ],
            ],
            'defaultVariants' => [
                'variant' => 'default',
                'size' => 'default',
            ],
        ],
    );
    $as = $attributes->get('href') ? 'a' : 'button';
@endphp

<{{ $as }} {{ $attributes->merge(['class' => $button(['variant' => $variant, 'size' => $size])]) }}
    @if ($attributes->get('type') == 'submit') x-data="{ loading: '{{ $attributes->get('loading') }}' ? true : false }" x-on:click="setTimeout(()=>{loading = Boolean($el.getAttribute('loading'))},1)" x-bind:disabled="loading" @endif>
    @if ($attributes->get('type') == 'submit')
        <x-tabler-loader-2 class="h-4 w-4 animate-spin" x-cloak x-show="loading" />
    @endif
    {{ $slot }}
    </{{ $as }}>
