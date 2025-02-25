@props([
    'size' => null,
    'type' => 'text',
    'mask' => '',
    'icon' => null,
    'iconRight' => null,
    'clearable' => false,
    'viewable' => false,
    'copyable' => false,
])

@php
    if ($clearable || $viewable || $copyable) {
        $iconRight = true;
    }
    $input = fn\cva(
        ['text-primary'],
        [
            'variants' => [
                'size' => [
                    'default' => 'h-10 px-4 py-2 ',
                    'sm' => 'h-8 px-3 text-xs',
                    'lg' => 'h-12 px-5',
                    'xl' => 'h-13 px-6 text-xl',
                ],
                'icon' => [
                    '' => '',
                    'default' => $iconRight ? 'pr-10' : 'ps-12',
                    'sm' => $iconRight ? 'pr-8' : 'ps-9',
                    'lg' => $iconRight ? 'pr-12' : 'ps-13',
                    'xl' => $iconRight ? 'pr-13' : 'ps-14',
                ],
            ],
            'defaultVariants' => [
                'size' => 'default',
                'icon' => '',
            ],
        ],
    );
    $icons = fn\cva(
        [],
        [
            'variants' => [
                'size' => [
                    'default' => implode(' ', ['w-10 p-2.5', $iconRight ? 'right-0' : 'left-0 ']),
                    'sm' => implode(' ', ['w-7 p-2', $iconRight ? 'right-0' : 'left-0']),
                    'lg' => implode(' ', ['w-11 p-3', $iconRight ? 'right-0' : 'left-0']),
                    'xl' => implode(' ', ['w-13 p-2', $iconRight ? 'right-0' : 'left-0']),
                ],
            ],
            'defaultVariants' => [
                'size' => 'default',
            ],
        ],
    );
    $iconSize = '';
    if ($icon || $iconRight) {
        $iconSize = $size ?? 'default';
    }
@endphp


<div x-data="{inputType: '{{ $type }}', copied: false, viewed: true }" class="relative w-full block group-input">

    <input x-bind:type="inputType" type="{{ $type }}"
        {{ $attributes->class([
            'flex w-full rounded-md bg-transparent text-sm transition-colors ',
            'file:mr-4 file:border-r file:border-input file:bg-background file:px-3 file:py-2.5 file:text-xs file:font-semibold hover:file:bg-accent file:mt-[-9px] file:ml-[-16px]',
            'placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring',
            'border border-input',
            'disabled:!cursor-not-allowed disabled:opacity-50 disabled:border disabled:shadow-sm disabled:border-input' => $attributes->get(
                'disabled',
            ),
            'read-only:bg-zinc-800/5 read-only:shadow-none' => $attributes->get('readonly'),
            'border-red-600' => $attributes->get('invalid'),
            $input([
                'size' => $size,
                'icon' => $iconSize,
            ]),
        ]) }}
        {{ $attributes->except(['class']) }} @if ($mask) x-mask="{{ $mask }}" @endif
         />
    {{ $slot }}
    @if ($icon)
        <div
            class="absolute hover:bg-accent top-0 m-1 h-[85%] text-zinc-400 flex items-center justify-center rounded-sm {{ $icons(['size' => $iconSize]) }}">
            @svg('tabler-' . $icon)
        </div>
    @endif
    @if ($iconRight && !($clearable || $viewable || $copyable))
        <div
            class="absolute hover:bg-accent top-0 m-1 h-[85%] text-zinc-400 flex items-center justify-center rounded-sm {{ $icons(['size' => $iconSize]) }}">
            @svg('tabler-' . $iconRight)
        </div>
    @endif
    @if ($copyable)
        <button type="button"
            class="absolute hover:bg-accent top-0 m-1 h-[85%] text-zinc-400 flex items-center justify-center rounded-sm {{ $icons(['size' => $iconSize]) }}"
            x-on:click="copied = ! copied; navigator.clipboard && navigator.clipboard.writeText($el.parentNode.querySelector('input').value); ;setTimeout(() => copied = false, 2000)">
            <x-tabler-copy x-cloak x-show="!copied" />
            <x-tabler-copy-check-filled x-cloak x-show="copied" />
        </button>
    @endif

    @if ($clearable)
        <button type="button"
            class="absolute hover:bg-accent top-0 m-1 h-[85%] text-zinc-400 flex items-center justify-center rounded-sm {{ $icons(['size' => $iconSize]) }}"
            x-on:click="$el.parentNode.querySelector('input').value=''" x-cloak x-show="$el.parentNode.querySelector('input').value!=''">
            <x-tabler-x />
        </button>
    @endif
    @if ($viewable)
        <button type="button"
            class="absolute hover:bg-accent top-0 m-1 h-[85%] text-zinc-400 flex items-center justify-center rounded-sm {{ $icons(['size' => $iconSize]) }}"
            x-on:click="viewed ? inputType='text' : inputType = 'password';viewed=!viewed">
            <x-tabler-eye-off x-cloak x-show="viewed" />
            <x-tabler-eye x-cloak x-show="!viewed" />
        </button>
    @endif
</div>

@if($mask)
    @include('portal::script.mask')
@endif