<h3 {{ $attributes->merge(['class' => 'text-sm flex']) }}>
    <button type="button" class="flex justify-between items-center flex-1 py-4 font-medium cursor-pointer" x-on:click="toggle(id)">
        {{ $slot }}
        <x-tabler-chevron-down
            x-bind:class="{
               'rotate-180' : expanded==id
            }"
            class="h-4 w-4 shrink-0 text-slate-500 transition-transform duration-200 dark:text-slate-400" />
    </button>
</h3>
