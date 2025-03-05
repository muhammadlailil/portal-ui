@props(['id'])

<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-cloak
    id="alert-dialog-{{ $id }}">
    <div class="fixed inset-0 bg-black/80 transition-opacity" aria-hidden="true" x-cloak
        x-show="alertDialog=='{{ $id }}'" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto" x-cloak x-show="alertDialog=='{{ $id }}'">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-cloak
                x-show="alertDialog=='{{ $id }}'" x-on:click.away="alertDialog = ''"
                {{ $attributes->merge(['class' => 'relative transform overflow-hidden rounded-lg bg-background border text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg']) }}>

                {{ $slot }}

            </div>
        </div>
    </div>
</div>
