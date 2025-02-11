@props(['title', 'description', 'logo', 'url' => ''])
<div
    {{ $attributes->merge(['class' => 'flex flex-col gap-2 p-2 group-data-[state=collapsed]:!p-0 transition-[padding] duration-200']) }}>
    <div class="flex w-full min-w-0 flex-col gap-1">
        <a href="{{ $url }}"
            class="flex gap-2 p-2 focus:ring-2 rounded-md hover:bg-sidebar-accent  transition-[left,right,width] duration-200">
            <img src="{{ $logo }}" alt="{{ $title }}" class="rounded-lg size-8 shrink-0">
            <div class="grid flex-1 text-left text-sm leading-tight">
                <span class="truncate font-semibold">
                    {{ $title }}
                </span>
                <span class="truncate text-xs">
                    {{ $description }}
                </span>
            </div>
        </a>
    </div>
</div>
