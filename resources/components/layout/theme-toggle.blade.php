<div x-data="{
    theme: localStorage.theme,
    toggleTheme() {
        var val = this.theme == 'dark' ? 'light' : 'dark'
        this.theme = val
        localStorage.theme = val;
        document.documentElement.classList.toggle('dark');
    }
}" {{ $attributes }}>
    <x-portal::button type="button" variant="ghost" class="!rounded-full w-10 !px-2" x-on:click="toggleTheme">
        <x-tabler-sun class="h-4" x-show="theme!='dark'" x-cloak />
        <x-tabler-moon class="h-4" x-show="theme=='dark'" x-cloak />
    </x-portal::button>
</div>
