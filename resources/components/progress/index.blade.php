@props(['value', 'color' => null])

@php
    $progressColors = fn\cva(
        ['h-full w-full flex-1 transition-all'],
        [
            'variants' => [
                'color' => [
                    'default' => 'bg-primary',
                    'red' => 'bg-red-500',
                    'orange' => 'bg-orange-500',
                    'amber' => 'bg-amber-500',
                    'yellow' => 'bg-yellow-500',
                    'lime' => 'bg-lime-500',
                    'green' => 'bg-green-500',
                    'emerald' => 'bg-emerald-500',
                    'teal' => 'bg-teal-500',
                    'cyan' => 'bg-cyan-500',
                    'sky' => 'bg-sky-500',
                    'blue' => 'bg-blue-500',
                    'indigo' => 'bg-indigo-500',
                    'violet' => 'bg-violet-500',
                    'purple' => 'bg-purple-500',
                    'fuchsia' => 'bg-fuchsia-500',
                    'pink' => 'bg-pink-500',
                    'rose' => 'bg-rose-500',
                ],
            ],
            'defaultVariants' => [
                'color' => 'default',
            ],
        ],
    );
    $progress = 100 - intval($value);
@endphp
<div {{ $attributes->merge(['class'=>'w-full relative h-2 overflow-hidden rounded-full bg-primary/20']) }}>
    <div data-state="indeterminate" data-max="100"  {{ $attributes->class([$progressColors(['color' => $color])]) }}
        style="transform: translateX(-{{$progress}}%);"></div>
</div>
