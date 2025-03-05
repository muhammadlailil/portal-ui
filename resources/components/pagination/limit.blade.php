@props(['limit', 'label' => 'Rows per page'])
@php
    $limits = [10, 20, 50, 100, 150];
@endphp
<div class="flex gap-2 items-center">
    <x-portal::label class="whitespace-nowrap hidden sm:block">
        {{ $label }}
    </x-portal::label>
    <div class="!w-[75px]">
        <x-portal::combobox {{ $attributes->merge(['class' => 'h-[35px]']) }} name="limit" id="pagination-limit"
            value="{{ $limit }}">
            <x-portal::combobox.content>
                @foreach ($limits as $option)
                    <x-portal::combobox.option
                        x-on:click="window.location.href='{{ request()->fullUrlWithQuery(['limit' => $option]) }}';open=false"
                        value="{{ $option }}" selected="{{ $limit == $option }}">
                        {{ $option }}
                    </x-portal::combobox.option>
                @endforeach
            </x-portal::combobox.content>
        </x-portal::combobox>
    </div>
</div>
