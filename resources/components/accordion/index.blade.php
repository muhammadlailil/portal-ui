<div
    x-data="{ 
        expanded: '',
        toggle(id){
            this.expanded = this.expanded == id ? '' : id
        }
    }"
    x-accordion
    {{ $attributes }}
>
    {{ $slot }}
</div>