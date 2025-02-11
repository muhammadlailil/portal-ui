@props(['icon', 'label', 'active' => false])
<li class="group/menu-item relative" x-data="{ collapse: Boolean('{{ $active }}'), menuOpen: false }">
    <button type="button" x-on:click="collapse=!collapse;menuOpen=!menuOpen;openDropdown()"
        x-on:mouseover="showTooltip('{{ $label }}',$el)" x-on:mouseleave="tooltip=false;" x-ref="dropdownTrigger"
        {{ $attributes->merge(['class' => '[&>svg]:shrink-0 cursor-pointer text-sm flex w-full items-center gap-2 overflow-hidden rounded-md p-2 text-left outline-none ring-sidebar-ring hover:bg-sidebar-accent [&>.icon]:h-4.5 [&>.icon]:w-4.5 relative']) }}>
        @svg('tabler-' . $icon, [
            'class' => 'icon',
        ])
        {{ $label }}
        <x-tabler-chevron-right
            class="absolute right-2 top-2 h-4.5 w-4.5 transition-all dura group-data-[state=collapsed]:opacity-0"
            x-bind:class="{ 'rotate-90': collapse }" />
    </button>
    <template x-if="state=='expanded'">
        <ul class="mx-3.5 flex min-w-0 translate-x-px flex-col  border-l border-sidebar-border px-2.5 py-0.5" x-cloak
            x-show="collapse" x-collapse>
            {{ $slot }}
        </ul>
    </template>
    <template x-if="state=='collapsed' ">
        <ul x-transition:enter.origin.top.right x-cloak x-show="menuOpen"
            x-anchor.right-start.offset.6="$refs.dropdownTrigger" x-on:click.away="menuOpen=false;dropdownOpen=false"
            class="z-50 min-w-[8rem] rounded-md border bg-popover p-1 text-popover-foreground shadow-md absolute w-fit">
            <x-portal::dropdown-menu.label>
                {{ $label }}
            </x-portal::dropdown-menu.label>
            <x-portal::dropdown-menu.separator />
            {{ $slot }}
        </ul>
    </template>
</li>
