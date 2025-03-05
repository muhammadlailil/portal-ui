@props([
    'variant' => null,
    'size' => null,
    'color' => null,
])
@php
    $alert = fn\cva(
        [
            'inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-[600] transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2',
        ],
        [
            'variants' => [
                'variant' => [
                    'default' => '',
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
                    'default' => $variant=='solid' ? 'bg-primary !text-primary-foreground' : 'text-zinc-700 bg-zinc-100 border-zinc-200',
                    'red' => $variant=='solid' ? 'bg-red-500' : 'text-red-400 bg-red-100 border-red-200' ,
                    'orange' => $variant=='solid' ? 'bg-orange-500' : 'text-orange-400 bg-orange-100 border-orange-200',
                    'amber' => $variant=='solid' ? 'bg-amber-500' : 'text-amber-400 bg-amber-100 border-amber-200',
                    'yellow' => $variant=='solid' ? 'bg-yellow-500' : 'text-yellow-400 bg-yellow-100 border-yellow-200',
                    'lime' => $variant=='solid' ? 'bg-lime-500' : 'text-lime-400 bg-lime-100 border-lime-200',
                    'green' => $variant=='solid' ? 'bg-green-500' : 'text-green-400 bg-green-100 border-green-200',
                    'emerald' => $variant=='solid' ? 'bg-emerald-500' : 'text-emerald-400 bg-emerald-100 border-emerald-200',
                    'teal' => $variant=='solid' ? 'bg-teal-500' : 'text-teal-400 bg-teal-100 border-teal-420', 
                    'cyan' => $variant=='solid' ? 'bg-cyan-500' : 'text-cyan-400 bg-cyan-100 border-cyan-420', 
                    'sky' => $variant=='solid' ? 'bg-sky-500' : 'text-sky-400 bg-sky-100 border-sky-420', 
                    'blue' => $variant=='solid' ? 'bg-blue-500' : 'text-blue-400 bg-blue-100 border-blue-420', 
                    'indigo' => $variant=='solid' ? 'bg-indigo-500' : 'text-indigo-400 bg-indigo-100 border-indigo-420', 
                    'violet' => $variant=='solid' ? 'bg-violet-500' : 'text-violet-400 bg-violet-100 border-violet-420', 
                    'purple' => $variant=='solid' ? 'bg-purple-500' : 'text-purple-400 bg-purple-100 border-purple-420', 
                    'fuchsia' => $variant=='solid' ? 'bg-fuchsia-500' : 'text-fuchsia-400 bg-fuchsia-100 border-fuchsia-420', 
                    'pink' => $variant=='solid' ? 'bg-pink-500' : 'text-pink-400 bg-pink-100 border-pink-420', 
                    'rose' => $variant=='solid' ? 'bg-rose-500' : 'text-rose-400 bg-rose-100 border-rose-420', 
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
