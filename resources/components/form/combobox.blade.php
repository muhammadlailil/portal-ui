@props([
    'label' => 'Label',
    'descriptionTrailing' => '',
    'description' => '',
    'search' => true,
    'searchPlaceholder' => 'Search ...',
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
    <x-portal::combobox {{ $attributes }}>
        @if ($search)
            <x-portal::combobox.search placeholder="{{ $searchPlaceholder }}" />
        @endif
        <x-portal::combobox.content>
            {{ $slot }}
        </x-portal::combobox.content>
    </x-portal::combobox>

    @if ($descriptionTrailing)
        <x-portal::form.description>
            {{ $descriptionTrailing }}
        </x-portal::form.description>
    @endif

</x-portal::form.item>
