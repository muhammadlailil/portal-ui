<div
    x-data="{hoverCard:false}"
    class="w-fit"
    x-on:mouseleave="hoverCard=false"
>
    {{ $slot }}
</div>