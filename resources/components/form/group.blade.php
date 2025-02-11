@props([
    'label' => 'Label',
    'descriptionTrailing' => '',
    'description' => '',
    'name' => ''
])

<x-portal::form.item name="{{$name}}">
    <x-portal::form.label>
        {{ $label }}
    </x-portal::form.label>

    @if ($description)
        <x-portal::form.description>
            {{ $description }}
        </x-portal::form.description>
    @endif
    {{ $slot }}

    @if ($descriptionTrailing)
        <x-portal::form.description>
            {{ $descriptionTrailing }}
        </x-portal::form.description>
    @endif

</x-portal::form.item>
