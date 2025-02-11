@props(['text' => null, 'orientation' => 'horizontal'])
@if (!$text)
    <div aria-orientation="{{ $orientation }}"
        {{ $attributes->class([
            'border-0 [print-color-adjust:exact] bg-border shrink-0',
            'h-px w-full' => $orientation == 'horizontal',
            'w-px h-full' => $orientation == 'vertical',
        ]) }}
        {{ $attributes->except(['class']) }}>
    </div>
@else
    <div class="flex items-center w-full">
        <div aria-orientation="{{ $orientation }}"
            {{ $attributes->class([
                'border-0 [print-color-adjust:exact] bg-border grow',
                'h-px w-full' => $orientation == 'horizontal',
                'w-px h-full' => $orientation == 'vertical',
            ]) }}
            {{ $attributes->except(['class']) }}>
        </div>
        <span
            class="shrink mx-6 font-medium text-sm text-zinc-500 dark:text-zinc-300 whitespace-nowrap">{{ $text }}</span>
        <div aria-orientation="{{ $orientation }}"
            {{ $attributes->class([
                'border-0 [print-color-adjust:exact] bg-border grow',
                'h-px w-full' => $orientation == 'horizontal',
                'w-px h-full' => $orientation == 'vertical',
            ]) }}
            {{ $attributes->except(['class']) }}>
        </div>
    </div>
@endif
