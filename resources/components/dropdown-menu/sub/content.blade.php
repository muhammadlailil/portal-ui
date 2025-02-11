<ul x-dropdown-menu:subitems x-transition:enter.origin.top.right
    x-anchor.right-start="$refs.dropdownSubTrigger" x-cloak x-show="open" 
    {{ $attributes->merge(['class' => 'z-50 min-w-[8rem] rounded-md border bg-popover p-1 text-popover-foreground shadow-md']) }}>
    {{ $slot }}
</ul>
