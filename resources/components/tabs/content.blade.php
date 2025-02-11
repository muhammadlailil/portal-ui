@props(['name'])
<div x-cloak x-show="active=='{{ $name }}'" {{ $attributes->merge(['class' => 'py-2']) }}>
    {{ $slot }}
</div>
