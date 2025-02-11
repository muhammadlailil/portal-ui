<span x-data="{
    showFallback: false,
    showImage: false,
    applyState() {
        if (!$refs.image) {
            this.showFallback = true;
            return
        }
        if (!$refs.image.complete) return

        this.showFallback = $refs.image.naturalWidth === 0 || $refs.image.naturalHeight === 0
        this.showImage = !this.showFallback
    },
}" x-init="$nextTick(() => applyState())"
    {{ $attributes->merge(['class' => 'relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full']) }}>
    {{ $slot }}
</span>
