<div {{ $attributes->merge(['class' => 'flex min-h-0 flex-1 flex-col gap-2']) }}
    x-bind:class="{
        'overflow-hidden group-data-[state=expanded]:!overflow-auto': !dropdownOpen
    }">
    {{ $slot }}
</div>
