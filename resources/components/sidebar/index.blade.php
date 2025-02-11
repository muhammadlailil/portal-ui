<div {{ $attributes->merge(['class' => 'group peer text-sidebar-foreground fixed md:relative transition-[left,right,width] duration-500 z-1']) }}
    x-bind:data-state="state" x-bind:data-mobile="sidebarMobile">
    <div
        class="w-[var(--sidebar-width)] group-data-[state=collapsed]:w-[var(--sidebar-width-icon)] bg-transparent transition-[left,right,width] duration-200 ease-linear">
    </div>
    <div class="bg-black/80 md:!hidden w-screen h-screen fixed hidden group-data-[mobile=open]:block transition-[left,display] duration-200 ease-linear" x-on:click="sidebarMobile='close'"></div>
    <div
        class="md:left-0 left-[-100%] group-data-[mobile=open]:left-0 fixed w-[var(--sidebar-width)] transition-[left,right,width] duration-200 ease-linear border-r h-full group-data-[state=collapsed]:w-[var(--sidebar-width-icon)]">
        <div class="bg-sidebar flex h-full w-full flex-col">
            {{ $slot }}
        </div>
    </div>
</div>
