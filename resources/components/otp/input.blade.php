@props([ 'size' => null, 'index'])
@php
    $input = fn\cva(
        [],
        [
            'variants' => [
                'size' => [
                    'default' => 'h-10 w-10  ',
                    'sm' => 'h-8 w-8 px-3 text-xs',
                    'lg' => 'h-12 w-12',
                    'xl' => 'h-13 w-13 text-xl',
                ],
            ],
            'defaultVariants' => [
                'size' => 'default',
            ],
        ],
    );
@endphp
<input type="text"
    {{ $attributes->class([
        'bg-transparent text-sm input-otp focus:z-[1] flex items-center text-center',
        'placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring',
        'border border-input shadow-sm',
        $input([
            'size' => $size,
        ]),
    ]) }}
    x-bind:name="inputName" required
    {{ $attributes->except(['class']) }}  maxlength="1" x-on:input.prevent="handleInput($el)" x-on:keydown.backspace="handleDelete($el)" x-on:paste.prevent="handlePaste($event)"
    data-index="{{ $index }}" x-ref="otp-{{ $index }}" />
