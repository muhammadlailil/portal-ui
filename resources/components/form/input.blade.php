@props([
    'type' => 'text',
    'label' => 'Label',
    'descriptionTrailing' => '',
    'description' => '',
])

<x-portal::form.item name="{{$attributes->get('name')}}">
    <x-portal::form.label>
        {{ $label }}
        @if($attributes->get('required'))
            <span class="text-red-500">*</span>
        @endif
    </x-portal::form.label>

    @if ($description)
        <x-portal::form.description>
            {{ $description }}
        </x-portal::form.description>
    @endif
    <x-portal::input type="{{ $type }}" {{ $attributes }} />

    @if ($descriptionTrailing)
        <x-portal::form.description>
            {{ $descriptionTrailing }}
        </x-portal::form.description>
    @endif

</x-portal::form.item>
