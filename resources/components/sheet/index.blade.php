@props([
    'side' => 'right',
    'id' => null,
    'variant' => null,
])
@php
    $sheet = fn\cva(
        [
            'bg-background [transition-behavior:allow-discrete] gap-4 p-6 px-0 shadow-lg transition-all outline-none',
            'backdrop:bg-black/80 backdrop:duration-300 backdrop:opacity-0 backdrop:transition-[opacity,display,overlay] backdrop:[transition-behavior:allow-discrete]',
            'open:backdrop:opacity-100  open:grid grid-rows-[auto_1fr_auto]',
            ':starting::open:backdrop:opacity-0 ease-in-out duration-500',
        ],
        [
            'variants' => [
                'variant' => [
                    'dialog' =>
                        'transition-[translate,opacity,scale,overlay,display] w-full max-w-lg border bg-background p-6 shadow-lg sm:rounded-lg open:animate-in animate-out',
                    'sheet' =>
                        'open:grid grid-rows-[auto_1fr_auto] m-0 gap-4 bg-background p-6 shadow-lg transition-[display,overlay,transform] ease-in-out duration-500',
                ],
                'side' => [
                    'top' =>
                        'max-w-full min-w-full overflow-x-auto !mb-auto border-b -translate-y-full open:translate-y-0 starting:open:-translate-y-full',
                    'bottom' =>
                        'max-w-full min-w-full overflow-x-auto !mt-auto border-t translate-y-full open:translate-y-0 starting:open:translate-y-full',
                    'left' =>
                        'max-h-dvh min-h-dvh overflow-y-auto !mr-auto w-3/4 border-r sm:max-w-md -translate-x-full open:translate-x-0 starting:open:-translate-x-full',
                    'right' =>
                        'max-h-dvh min-h-dvh overflow-y-auto !ml-auto w-3/4 border-l sm:max-w-md translate-x-full open:translate-x-0 starting:open:translate-x-full',
                    'center' => 'open:fade-in-0 open:zoom-in-95 fade-out-0 zoom-out-95 ',
                ],
            ],
            'defaultVariants' => [
                'side' => 'right',
                'variant' => 'sheet',
            ],
        ],
    );
@endphp
<dialog x-data="{
    closeDialog($el, $event) {
        const rect = $el.getBoundingClientRect();
        if (
            event.clientX < rect.left ||
            event.clientX > rect.right ||
            event.clientY < rect.top ||
            event.clientY > rect.bottom
        ) {
            this.openSheet = ''
        }
    }
}" x-on:cancel="openSheet = ''" x-on:click="closeDialog($el,$event)"
    x-effect="openSheet=='{{ $id }}' ? $el.showModal() : $el.close()"
    {{ $attributes->merge([
        'class' => $sheet([
            'side' => $side,
            'variant' => $variant,
        ]),
    ]) }}>
    <x-portal::sheet.close variant="icon"
        class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background  transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none">
        <x-tabler-x class="size-4 text-primary" />
    </x-portal::sheet.close>
    {{ $slot }}
</dialog>
