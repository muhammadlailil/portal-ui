<div x-data="{
    open: false,
    close(focusAfter) {
        if (!this.open) return
        this.open = false
        focusAfter && focusAfter.focus()
    }
}" x-on:keydown.escape.window="close($refs.triggerPopover)"
    x-on:focusin.window="! $refs.popoverContent.contains($event.target) && close()" {{ $attributes }}>
    {{ $slot }}
</div>