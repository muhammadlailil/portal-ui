@props([
    'name' => '',
])
<div @error($name) error="true" @enderror {{ $attributes->merge(['class' => 'space-y-2']) }}>
    {{ $slot }}
    <x-portal::form.message name="{{ $name }}" />
</div>
