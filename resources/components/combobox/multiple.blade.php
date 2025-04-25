@props(['placeholder', 'size' => null, 'name'])
@php
    $combobox = fn\cva(
        [
            'w-full border rounded-md border-input flex items-center cursor-pointer relative z-[1] bg-background',
        ],
        [
            'variants' => [
                'size' => [
                    'default' => 'min-h-10 px-4 text-sm',
                    'sm' => 'min-h-8 px-3 text-xs',
                    'lg' => 'min-h-12 px-5',
                    'xl' => 'min-h-13 px-6 text-lg',
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
    multiple : true,
    search: '',
    selecteds : [],
    values : [],
    items: [],
    filtered: [],
    addItem(el) {
        const selected = el.getAttribute('selected')
        const value = el.getAttribute('data-value')
        this.items.push({
            label : this.getElementContent(el) || value,
            value : value,
            el : el
        })
        this.filtered = this.items
        if (selected) {
               this.selecteds.push({
                    value : el.getAttribute('data-value'),
                    label : el.innerHTML
               })
        }
    },
    filter() {
        this.filtered = this.items.filter((row) => row.label.toLowerCase().includes(this.search.toLowerCase()))
    },
    getElementContent(el) {
        return el.innerText.replace(/(^\s*)|(\s*$)/gi, '').replace(/[ ]{2,}/gi, ' ').replace(/\n +/, '\n')
    },
    selectItem(el) {
        const value = el.getAttribute('data-value')
        const content = el.innerHTML
        if(!this.selecteds.map((row)=>row.value).includes(value)){
          this.selecteds.push({
               value : value,
               label : content
          })
          this.values.push(value)
        }else{
          this.selecteds = this.selecteds.filter((row)=>row.value!=value)
          this.values = this.values.filter((row)=>row!=value)
        }
        this.search = ''
        this.filtered = this.items
        window.dispatchEvent(
            new CustomEvent('select-{{ $name }}-change', {
                detail : el
            })
        )
    },
    changeValue($el){
          if($el.target.getAttribute('selected')){
               let values = $el.target.getAttribute('selected').toString()
               values = values.split(',');
               const items = this.items.filter((row)=>values.includes(row.value)).map((row)=>{
                    return {
                         value : row.value,
                         label : row.label
                    }
               })
               this.values = items.map((row)=>row.value)
               this.selecteds = items
          }else{
              this.selecteds = []
          }
    }
}" class="relative combobox">
    <select @required($attributes->get('required')) multiple name="{{ $name }}" x-model="values" x-on:change="changeValue" class="rounded-md h-4 absolute pointer-events-none w-fit outline-none bg-transparent">
        <option value=""></option>
        <template x-for="item in filtered">
            <option x-bind:value="item.value" x-html="item.value"></option>
        </template>
    </select>
    <button type="button" {{ $attributes->merge(['class' => $combobox(['size' => $size])]) }} x-on:click="open=!open"
        x-ref="combobox">
        <div class="flex items-center justify-between w-full">
            <span class="text-muted-foreground select-none" x-show="!selecteds.length">
                {{ @$placeholder ?: $attributes->get('value') }}
            </span>
            <span x-html="selecteds.map((row)=>row.label).toString()" x-show="selecteds.length" class="flex gap-2 text-left py-2"></span>
            <x-portal::icon.up-down class="opacity-50 h-4 mr-[-5px]" />
        </div>
    </button>
    <div class="sm:hidden fixed inset-0 bg-black/80 transition-opacity" aria-hidden="true" x-cloak x-show="open"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
    <div class="sm:relative fixed inset-0 z-10 sm:w-full w-screen flex items-end" x-show="open" x-cloak>
        <div x-show="open" x-cloak x-anchor.bottom-start.offset.6="$refs.combobox" x-on:click.away="open=false"
            x-transition:enter-end="translate-y-0"
            class="absolute bg-background border rounded-md text-left right-0 w-full z-10 shadow-md max-h-[50vh] overflow-auto combobox-content">
            {{ $slot }}
            <div class="py-6 text-center text-sm" cmdk-empty="" role="presentation" x-show="!filtered.length" x-cloak>
                No items found.
            </div>
        </div>
    </div>
</div>
