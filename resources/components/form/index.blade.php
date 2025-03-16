<form x-data="{ submitted: false }" x-on:submit="submitted=true" {{ $attributes->merge(['class' => 'space-y-5']) }}>
    {{ $slot }}
</form>