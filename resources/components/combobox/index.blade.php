@props(['placeholder', 'size' => null, 'name'])
@php
    $combobox = fn\cva(
        [
            'w-full border rounded-md border-input flex items-center file:bg-transparent file:text-sm file:font-medium cursor-pointer',
        ],
        [
            'variants' => [
                'size' => [
                    'default' => 'h-10 px-4 text-sm',
                    'sm' => 'h-8 px-3 text-xs',
                    'lg' => 'h-12 px-5',
                    'xl' => 'h-13 px-6 text-lg',
                ],
            ],
            'defaultVariants' => [
                'variant' => 'default',
                'size' => 'default',
            ],
        ],
    );
@endphp

<div x-data="{
    open: false,
    search: '',
    value: '',
    label: '',
    items: [],
    filtered: [],
    addItem(el) {
        const selected = el.getAttribute('selected')
        this.items.push(this.getElementContent(el))
        this.filtered = this.items
        if (selected) {
            this.value = el.getAttribute('data-value')
            this.label = el.innerHTML
        }
    },
    filter() {
        this.filtered = this.items.filter((row) => row.toLowerCase().includes(this.search.toLowerCase()))
    },
    getElementContent(el) {
        return el.innerText.replace(/(^\s*)|(\s*$)/gi, '').replace(/[ ]{2,}/gi, ' ').replace(/\n +/, '\n')
    },
    selectItem(el) {
        const value = el.getAttribute('data-value')
        const content = el.innerHTML
        this.open = false
        this.value = value
        this.label = content
        this.search = ''
        this.filtered = this.items
    }
}" class="relative">
    <input type="hidden" name="{{ $name }}" x-model="value">
    <button type="button" {{ $attributes->merge(['class' => $combobox(['size' => $size])]) }} x-on:click="open=!open"
        x-ref="combobox">
        <div class="flex items-center justify-between w-full">
            <span class="text-muted-foreground select-none" x-show="label==''">
                {{ @$placeholder ?: $attributes->get('value') }}
            </span>
            <span x-html="label" x-show="label!=''" class="flex gap-2"></span>
            <x-portal::icon.up-down class="opacity-50 h-4 mr-[-5px]" />
        </div>
    </button>
    <div class="sm:hidden fixed inset-0 bg-black/80 transition-opacity" aria-hidden="true" x-cloak x-show="open"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
    <div class="sm:relative fixed inset-0 z-10 sm:w-full w-screen flex items-end" x-show="open" x-cloak >
        <div x-show="open" x-cloak x-anchor.bottom-start="$refs.combobox" x-on:click.away="open=false"
            x-transition:enter-end="translate-y-0"
            class="absolute bg-background border rounded-md text-left right-0 w-full z-10 mt-2 mb-2 shadow-md max-h-[50vh] overflow-auto combobox-content">
            {{ $slot }}
            <div class="py-6 text-center text-sm" cmdk-empty="" role="presentation" x-show="!filtered.length" x-cloak>
                No  items found.
            </div>
        </div>
    </div>
</div>