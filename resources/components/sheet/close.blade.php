<x-portal::button
    x-on:click="openSheet = ''"
    {{ $attributes }}
>
    {{ $slot }}
    <span class="sr-only">Close</span>
</x-portal::button>