@props(['placeholder'])
<div class="flex items-center border-b px-3" cmdk-input-wrapper="">
    <x-tabler-search class="mr-2 h-4 w-4 shrink-0 opacity-50"/>
    <input
        class="flex w-full rounded-md bg-transparent py-3 text-sm outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed disabled:opacity-50 h-9"
        placeholder="{{ $placeholder }}" autocomplete="off" autocorrect="off" spellcheck="false"
        aria-autocomplete="list" role="combobox" type="text" x-model="search" x-on:keyup="filter">
</div>
