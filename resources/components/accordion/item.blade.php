@props(['value', 'disabled', 'expanded', 'heading','value'])

<div x-data="{ id: '{{$value}}' }" class="border-b dark:border-white/20">
    @if (@$heading)
        <x-portal::accordion.heading>
            {{ $heading }}
        </x-portal::accordion.heading>
    @endif
    {{ $slot }}
</div>