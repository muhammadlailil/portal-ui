<form {{ $attributes->merge(['class' => 'bg-background px-4 py-5 sm:p-6 sm:pb-5']) }} x-data="{ submited: false }"
    x-on:submit="submited=true">
    <div class="flex flex-col space-y-2 text-center sm:text-left">
        {{ $slot }}
    </div>
</form>
