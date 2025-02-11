@props([
    'disabled' => false,
    'value',
    'name',
])
<li role="menuitemcheckbox" aria-disabled="{{ $disabled ? 'true' : 'false' }}" aria-label="{{ $slot }}"
    tabindex="-1"
    {{ $attributes->class([
        'hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground cursor-pointer',
        'relative flex w-full cursor-default items-center',
        'rounded-sm py-1.5 text-sm outline-none transition-colors',
        'opacity-50 !cursor-not-allowed select-none' => $disabled,
        'pl-8',
    ]) }}
    {{ $attributes->when($disabled, function ($attributes) {
            return $attributes->except(['x-model', 'wire:model', 'x-on:click']);
        })->except('class') }}
    x-data="{
        value: '{{ $value }}',
        triggerClick() {
               if($el.getAttribute('aria-disabled')=='false'){
                   this.selected = this.value
               }
               this.menuOpen = false
        }
    }" x-on:click="triggerClick()">

    <span class="absolute left-2 flex h-3.5 w-3.5 items-center justify-center" x-show="selected==value" x-cloak>
        <x-tabler-check class="w-4 h-4" />
    </span>
    <template x-if="selected==value">
        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
    </template>
    {{ $slot }}
</li>
