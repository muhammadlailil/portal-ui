<x-portal::button {{ $attributes }} x-ref="dropdownTrigger" x-on:click="menuOpen=!menuOpen">
    {{ $slot }}
</x-portal::button>
