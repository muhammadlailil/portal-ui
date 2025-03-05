@props([
    'label' => null,
    'description' => null,
])
<label for="{{ $attributes->get('id') }}"
    class="space-x-2 checkbox-item peer-disabled:cursor-not-allowed peer-disabled:opacity-3 group has-[:checked]:border-zinc-800 cursor-pointer bg-background flex gap-[5px] w-fit">
    <input type="radio"
        {{ $attributes->merge(['class' => 'peer rounded-full h-4.5 w-4.5 shrink-0 checked:text-primary dark:bg-background dark:checked:bg-white disabled:cursor-not-allowed disabled:opacity-50']) }} />

    @if ($label)
        <span
            class="text-sm font-medium select-none text-zinc-800 dark:text-white peer-disabled:cursor-not-allowed peer-disabled:opacity-30">
            {{ $label }}
        </span>
    @endif
    @if ($description)
        <div
            class="text-sm text-zinc-500 dark:text-white/60 peer-disabled:cursor-not-allowed peer-disabled:opacity-30 ps-7.5">
            {{ $description }}
        </div>
    @endif
    {{ $slot }}
</label>
