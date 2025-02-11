@props(['open'])
<div x-data="{ active: '{{ $open }}' }" {{ $attributes }}>
    {{ $slot }}
</div>
