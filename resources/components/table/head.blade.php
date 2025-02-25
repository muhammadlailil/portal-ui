@props(['sortable' => false, 'key' => ''])
@php
    $direction = 'asc';
    $as = 'div';
    $icon = 'down';
    $href = '';
    if ($sortable) {
        $as = 'a';
        if (request('sortBy') == $key) {
            $direction = request('sortDirection') == 'asc' ? 'asc' : 'desc';
        }
        $href = request()->fullUrlWithQuery([
            'sortBy' => $key,
            'sortDirection' => $direction == 'asc' ? 'desc' : 'asc',
        ]);
    }
    if ($direction == 'desc') {
        $icon = 'up';
    }
@endphp
<th {{ $attributes->merge(['class' => 'px-5 py-3 text-sm font-medium text-muted-foreground text-left']) }}>
    <{{ $as }} href="{{ $href }}"
        class="flex space-x-2 items-center [&>.icon]:opacity-50 hover:[&>.icon]:opacity-100">
        {{ $slot }}
        @if ($sortable)
            @svg('tabler-chevron-' . $icon, [
                'class' => 'h-3.5 icon !opacity-100',
            ])
        @endif
        </{{ $as }}>
</th>
