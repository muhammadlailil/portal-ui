@props(['href' => null, 'separator' => null])
<div class="flex items-center text-sm group/breadcrumb">
    @if ($href)
        <a href="{{$href}}" class="text-gray-500 dark:text-white hover:underline decoration-zinc-800/20 underline-offset-4">
            {{ $slot }}
        </a>
    @else
        <div class=" dark:text-white/80 text-zinc-800 font-medium">
            {{ $slot }}
        </div>
    @endif
    @switch($separator)
        @case('slash')
            <x-tabler-slash
                class="shrink-0 [:where(&)]:size-3.5 mx-2 text-zinc-600 dark:text-white/80 group-last/breadcrumb:hidden" />
        @break

        @case('double')
            <x-tabler-chevrons-right
                class="shrink-0 [:where(&)]:size-3.5 mx-2 text-zinc-600 dark:text-white/80 group-last/breadcrumb:hidden" />
        @break

        @case('double-slash')
            <x-tabler-slashes
                class="shrink-0 [:where(&)]:size-3.5 mx-2 text-zinc-600 dark:text-white/80 group-last/breadcrumb:hidden" />
        @break

        @default
            <x-tabler-chevron-right
                class="shrink-0 [:where(&)]:size-3.5 mx-2 text-zinc-600 dark:text-white/80 group-last/breadcrumb:hidden" />
    @endswitch
</div>
