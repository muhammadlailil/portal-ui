<img
    x-show="showImage"
    x-ref="image"
    x-cloak
    x-init="$el.addEventListener('error', () => applyState());
    $el.addEventListener('load', () => applyState());"
    {{ $attributes->merge(['class'=>'aspect-square h-full w-full']) }}
/>