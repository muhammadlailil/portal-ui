@props(['paginator'])
@if ($paginator->hasPages())
    <nav class="flex items-center " aria-label="{{ __('Pagination Navigation') }}">
        <div class="flex justify-between flex-1 sm:hidden gap-2">
            <x-portal::pagination.prev variant="outline" class=" h-[35px]"
                href="{{ $paginator->onFirstPage() ? '' : $paginator->previousPageUrl() }}" />
            <x-portal::pagination.next variant="outline" class=" h-[35px]"
                href="{{ !$paginator->hasMorePages() ? '' : $paginator->nextPageUrl() }}" />
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center gap-2">
            @foreach ($paginator->appends(request()->query())->onEachSide(1)->linkCollection() as $element)
                @if (str_contains(strtolower($element['label']), 'previous'))
                    <x-portal::pagination.prev href="{{ $element['url'] }}" class="h-[35px]"/>
                @elseif(str_contains(strtolower($element['label']), 'next'))
                    <x-portal::pagination.next href="{{ $element['url'] }}" class="h-[35px]"/>
                @else
                    <x-portal::pagination.link href="{!! $element['url'] !!}" active="{{$element['active']}}" class="{{!$element['url'] ? '!px-2 !opacity-100 w-[35px] h-[35px]' : 'w-[35px] h-[35px]'}}">
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
