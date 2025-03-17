@props([
    'size' => null,
    'icon' => null,
    'format' => ''
])
@php
    $datepicker = fn\cva(
        [
            'w-full border rounded-md border-input flex items-center shadow-smx file:bg-transparent file:text-sm file:font-medium ',
            $attributes->get('mode')=='range' ? 'datepicker-range' : '',
            !$attributes->get('mode') && !$attributes->get('type') ? 'datepicker' : ''
        ],
        [
            'variants' => [
                'size' => [
                    'default' => 'h-10 px-4 text-sm',
                    'sm' => 'h-8 px-3 text-xs',
                    'lg' => 'h-12 px-5',
                    'xl' => 'h-13 px-6 text-lg',
                ],
            ],
            'defaultVariants' => [
                'variant' => 'default',
                'size' => 'default',
            ],
        ],
    );
@endphp

<div class="relative datepicker-input">
    <input {{ $attributes->merge(['class' => $datepicker(['size' => $size])]) }} />
    @if ($icon == 'time')
        <x-tabler-clock class="opacity-50 h-5 absolute right-4 top-2.5 pointer-events-none" />
    @else
        <x-tabler-calendar-week-filled class="opacity-50 h-5 absolute right-4 top-2.5 pointer-events-none" />
    @endif
</div>


@include('portal::script.datepicker')