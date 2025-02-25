@props(['title', 'description', 'profile' => '', 'alias' => ''])
<div {{ $attributes->merge(['class' => 'flex w-full min-w-0 flex-col gap-1']) }}>
    <x-portal::dropdown-menu class="flex items-center">
        <button type="button" class="rounded-full" x-ref="dropdownTrigger" x-on:click="menuOpen=!menuOpen">
            <x-portal::avatar class="!h-8 !w-8">
                @if ($profile)
                    <x-portal::avatar.image src="{{ $profile }}" alt="{{ $title }}"
                        class="!rounded-lg !border" />
                @endif
                <x-portal::avatar.fallback class="!border">{{ $alias }}</x-portal::avatar.fallback>
            </x-portal::avatar>
        </button>
        <x-portal::dropdown-menu.content class="w-56" side="bottom" align="end">
            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                <x-portal::avatar class="!rounded-lg !h-8 !w-8">
                    @if ($profile)
                        <x-portal::avatar.image src="{{ $profile }}" alt="{{ $title }}"
                            class="!rounded-lg !border" />
                    @endif
                    <x-portal::avatar.fallback
                        class="!rounded-lg !border">{{ $alias }}</x-portal::avatar.fallback>
                </x-portal::avatar>
                <div class="grid flex-1 text-left text-sm leading-tight">
                    <span class="truncate font-semibold">
                        {{ $title }}
                    </span>
                    <span class="truncate text-xs">
                        {{ $description }}
                    </span>
                </div>
            </div>
            {{ $slot }}
        </x-portal::dropdown-menu.content>
    </x-portal::dropdown-menu>
</div>
