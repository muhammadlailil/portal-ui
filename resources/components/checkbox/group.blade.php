@props(['label'])
<div class="checkbox-group">
    <x-portal::label class="block mb-3">
        {{ $label }}
    </x-portal::label>
    <div {{ $attributes->merge(['class' => 'flex gap-3']) }}>
        {{ $slot }}
    </div>
</div>
