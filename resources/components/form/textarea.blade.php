@props([
    'label' => 'Label',
    'descriptionTrailing' => '',
    'description' => '',
])

<x-portal::form.item name="{{$attributes->get('name')}}">
    <x-portal::form.label>
        {{ $label }}
    </x-portal::form.label>

    @if ($description)
        <x-portal::form.description>
            {{ $description }}
        </x-portal::form.description>
    @endif
    <x-portal::textarea {{ $attributes }} />

    @if ($descriptionTrailing)
        <x-portal::form.description>
            {{ $descriptionTrailing }}
        </x-portal::form.description>
    @endif

</x-portal::form.item>
