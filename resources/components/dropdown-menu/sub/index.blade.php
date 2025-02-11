<li
    role="none"
    x-data="{
        open : false,
    }"
    {{ $attributes->merge(['class'=>'focus-within:bg-accent focus-within:text-accent-foreground']) }}
    x-on:mouseenter="open=true"
    x-on:mouseleave="open=false"
>
    {{ $slot }}
</li>
