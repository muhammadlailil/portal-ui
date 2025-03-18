@props(['label'])
<div class="checkbox-group">
    <x-portal::label class="block mb-3">
        {{ $label }}
        @if($attributes->get('required'))
            <span class="text-red-500">*</span>
        @endif
    </x-portal::label>
    <div {{ $attributes->merge(['class' => 'flex gap-3']) }}>
        {{ $slot }}
    </div>
</div>
