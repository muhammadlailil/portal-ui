@props(['close' => true])
<div {{ $attributes->merge(['class' => 'flex flex-col space-y-1.5 text-center sm:text-left p-6 pb-4 relative']) }}>
    {{ $slot }}
    @if ($close)
        <button type="button" class="absolute right-4 top-4 opacity-70 hover:opacity-100" x-on:click="dialog=''">
            <x-tabler-x class="h-4 w-4" />
        </button>
    @endif
</div>
