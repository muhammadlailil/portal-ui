@props(['href' => null,'variant'=>'ghost'])
<x-portal::button as="{{ $href ? 'a' : 'button' }}" href="{{ $href }}" disabled="{{ !$href }}" variant="{{$variant}}"
    {{$attributes->merge(['class'=>'!pl-2 !gap-0'])}}>
    <x-tabler-chevron-left class="h-4.5" />
    Previous
</x-portal::button>
