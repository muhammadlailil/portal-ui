<div x-data="{
    state: 'expanded',
    sidebarMobile : 'close',
    tooltip: false,
    dropdownOpen: false,
    tooltipLabel: '',
    tooltipPosition: {
        top: 0,
        left: 0,
    },
    toggleSidebar() {
        const screen = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        if(screen>=768){
            this.state = this.state == 'expanded' ? 'collapsed' : 'expanded'
        }else{
            this.state = 'expanded';
            this.sidebarMobile = this.sidebarMobile=='close' ? 'open' : 'close'
        }
    },
    openDropdown() {
        if (this.state == 'collapsed') {
            setTimeout(()=>{
                this.dropdownOpen = true
            },1)
        }
    },
    showTooltip(label, $el) {
        var rect = $el.getBoundingClientRect();
        this.tooltipPosition = {
            left: rect.left + 40,
            top: rect.top + 7
        }
        this.tooltip = true
        this.tooltipLabel = label
    },
}" {{ $attributes->merge(['class' => 'relative flex min-h-svh flex-col bg-background']) }}>
    <div class="themes-wrapper bg-background">
        <div class="group/sidebar-wrapper flex min-h-svh w-full has-[[data-variant=inset]]:bg-sidebar">
            {{ $slot }}
        </div>
    </div>
    <template x-if="state=='collapsed'">
        <div x-cloak x-show="tooltip && tooltipLabel && !dropdownOpen"
            class="z-2 overflow-hidden rounded-md bg-primary px-3 py-1.5 text-xs text-primary-foreground w-fit absolute"
            x-bind:class="{'hidden' : dropdownOpen}"
            x-html="tooltipLabel"
            x-bind:style="{
                top: `${tooltipPosition.top}px`,
                left: `${tooltipPosition.left}px`,
            }">
        </div>
    </template>
</div>
