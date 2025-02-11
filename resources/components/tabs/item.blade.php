@props(['name'])
<button type="button" aria-label="tabs" {{ $attributes->merge(['class' => 'w-full text-sm hover:text-primary']) }}
    x-on:click="active='{{ $name }}'" x-bind:active="active=='{{ $name }}'"
    x-bind:class="{
        'border-b border-primary text-primary mb-[-1px]': active == '{{ $name }}',
        'text-zinc-400': active!='{{ $name }}'
    }">
    {{ $slot }}
</button>
