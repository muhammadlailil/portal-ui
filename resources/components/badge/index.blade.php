@props([
    'variant' => null,
    'size' => null,
    'color' => null,
])
@php
    $alert = fn\cva(
        [
            'inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2',
        ],
        [
            'variants' => [
                'variant' => [
                    'default' => '!border-transparent',
                    'outline' => 'border',
                    'solid' => '!border-transparent text-white'
                ],
                'size' => [
                    'default' => 'px-2.5 py-0.5',
                    'sm' => 'h-8 rounded-md px-3 text-xs',
                    'lg' => 'h-10 rounded-md px-8',
                    'icon' => 'h-9 w-9',
                ],
                'color' => [
                    'default' => $variant=='solid' ? 'bg-primary !text-primary-foreground' : 'text-zinc-700 bg-zinc-200 border-zinc-400',
                    'red' => $variant=='solid' ? 'bg-red-500' : 'text-red-700 bg-red-200 border-red-400' ,
                    'orange' => $variant=='solid' ? 'bg-orange-500' : 'text-orange-700 bg-orange-200 border-orange-400',
                    'amber' => $variant=='solid' ? 'bg-amber-500' : 'text-amber-700 bg-amber-200 border-amber-400',
                    'yellow' => $variant=='solid' ? 'bg-yellow-500' : 'text-yellow-700 bg-yellow-200 border-yellow-400',
                    'lime' => $variant=='solid' ? 'bg-lime-500' : 'text-lime-700 bg-lime-200 border-lime-400',
                    'green' => $variant=='solid' ? 'bg-green-500' : 'text-green-700 bg-green-200 border-green-400',
                    'emerald' => $variant=='solid' ? 'bg-emerald-500' : 'text-emerald-700 bg-emerald-200 border-emerald-400',
                    'teal' => $variant=='solid' ? 'bg-teal-500' : 'text-teal-700 bg-teal-200 border-teal-400', 
                    'cyan' => $variant=='solid' ? 'bg-cyan-500' : 'text-cyan-700 bg-cyan-200 border-cyan-400', 
                    'sky' => $variant=='solid' ? 'bg-sky-500' : 'text-sky-700 bg-sky-200 border-sky-400', 
                    'blue' => $variant=='solid' ? 'bg-blue-500' : 'text-blue-700 bg-blue-200 border-blue-400', 
                    'indigo' => $variant=='solid' ? 'bg-indigo-500' : 'text-indigo-700 bg-indigo-200 border-indigo-400', 
                    'violet' => $variant=='solid' ? 'bg-violet-500' : 'text-violet-700 bg-violet-200 border-violet-400', 
                    'purple' => $variant=='solid' ? 'bg-purple-500' : 'text-purple-700 bg-purple-200 border-purple-400', 
                    'fuchsia' => $variant=='solid' ? 'bg-fuchsia-500' : 'text-fuchsia-700 bg-fuchsia-200 border-fuchsia-400', 
                    'pink' => $variant=='solid' ? 'bg-pink-500' : 'text-pink-700 bg-pink-200 border-pink-400', 
                    'rose' => $variant=='solid' ? 'bg-rose-500' : 'text-rose-700 bg-rose-200 border-rose-400', 
                ],
            ],
            'defaultVariants' => [
                'variant' => 'default',
                'size' => 'default',
                'color' => 'default',
            ],
        ],
    );
@endphp

<span
    {{ $attributes->merge([
        'class' => $alert([
            'variant' => $variant,
            'size' => $size,
            'color' => $color,
        ]),
    ]) }}>
    {{ $slot }}
</span>
