<form x-data="{ submited: false }" x-on:submit="submited=true" {{ $attributes->merge(['class' => 'space-y-5']) }}>
    {{ $slot }}
</form>