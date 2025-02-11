@props(['htmlFor' => ''])

<label @if ($htmlFor) for="{{ $htmlFor }}" @endif
    {{ $attributes->merge(['class' => 'text-sm font-medium text-primary leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70']) }}>
    {{ $slot }}
</label>
