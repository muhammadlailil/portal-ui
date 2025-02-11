@props(['paginator'])
@if ($paginator->hasPages())
    <nav class="flex items-center " aria-label="{{ __('Pagination Navigation') }}">
        <div class="flex justify-between flex-1 sm:hidden gap-2">
            <x-portal::pagination.prev variant="outline" class="w-28"
                href="{{ $paginator->onFirstPage() ? '' : $paginator->previousPageUrl() }}" />
            <x-portal::pagination.next variant="outline" class="w-28"
                href="{{ !$paginator->hasMorePages() ? '' : $paginator->nextPageUrl() }}" />
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center gap-2">
            @foreach ($paginator->appends(request()->query())->onEachSide(1)->linkCollection() as $element)
                @if (str_contains(strtolower($element['label']), 'previous'))
                    <x-portal::pagination.prev class="w-28" href="{{ $element['url'] }}" />
                @elseif(str_contains(strtolower($element['label']), 'next'))
                    <x-portal::pagination.next class="w-28" href="{{ $element['url'] }}" />
                @else
                    <x-portal::pagination.link href="{!! $element['url'] !!}" active="{{$element['active']}}" class="{{!$element['url'] ? '!px-2 !opacity-100' : ''}}">
                        @if ($element['url'])
                            {{ $element['label'] }}
                        @else
                            <x-tabler-dots class="h-4.5" />
                        @endif
                    </x-portal::pagination.link>
                @endif
            @endforeach
        </div>
    </nav>
@endif
