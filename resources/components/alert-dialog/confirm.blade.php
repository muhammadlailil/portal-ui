@props(['variant' => 'default'])
<x-portal::button type="submit" variant="{{$variant}}" class="gap-2" x-bind:disabled="submitted">
    <x-tabler-loader-2 class="h-4 w-4 animate-spin" x-show="submitted" x-cloak/>
    {{ $slot }}
</x-portal::button>
