<div x-data="{ openCommand: false }" x-init="$watch('openCommand', function(value) {
    if (value === true) {
        document.body.classList.add('overflow-hidden');
    } else {
        document.body.classList.remove('overflow-hidden');
    }
})" x-on:keydown.escape.window="openCommand = false"
    x-on:open-command.window="openCommand=true" {{ $attributes }}>
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-cloak>
        <div class="fixed inset-0 bg-black/80 transition-opacity" aria-hidden="true" x-cloak x-show="openCommand"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto" x-show="openCommand" x-cloak>
            <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-lg bg-background border text-left shadow-xl transition-all sm:my-8 sm:max-w-lg sm:min-w-lg w-full"
                    x-show="openCommand" x-on:click.away="openCommand=false" x-cloak>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
