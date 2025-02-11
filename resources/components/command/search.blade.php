<div class="flex items-center border-b px-3">
    <x-tabler-search class="h-6 w-6 shrink-0 opacity-50 mr-3" />
    <input
        {{ $attributes->merge(['class' => 'flex h-12 w-full rounded-md bg-transparent py-3 text-sm outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed disabled:opacity-50']) }}
        placeholder="Type a command or search..." autocomplete="off" autocorrect="off" spellcheck="false">
    <x-tabler-x class="h-5 w-5 shrink-0 cursor-pointer" x-on:click="openCommand=false" />
</div>
