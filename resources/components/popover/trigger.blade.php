<div x-ref="triggerPopover" x-on:click="open = !open" {{ $attributes->merge(['class' => 'inline-flex']) }}>
    {{ $slot }}
</div>
