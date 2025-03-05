<tr {{ $attributes->merge(['class' => 'hover:bg-muted/50 data-[state=selected]:bg-muted']) }}>
    {{ $slot }}
</tr>
