<div x-data="{
    menuOpen: false,
    checked: [],
    selected: '',
    setChecked(value) {
        this.checked = value
    },
    setSelected(value) {
        this.selected = value
    }
}" {{ $attributes }}>
    {{ $slot }}
</div>
