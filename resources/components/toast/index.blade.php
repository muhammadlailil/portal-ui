@props([
    'position' => 'bottom-right',
])
<div x-data="{
    notifications: [],
    displayDuration: 8000,
    addNotification({ variant = 'default', title = null, message = null, action = null, duration = null, position = '{{ $position }}' }) {
        if (!title && !message) {
            return
        }
        const id = Date.now()
        const notification = {
            id,
            variant: variant,
            title: title,
            message: message,
            duration: duration || this.displayDuration,
            action: action,
            position: position
        }
        if (this.notifications.length >= 7) {
            this.notifications.splice(0, this.notifications.length - 6)
        }

        this.notifications = [notification]
    },
    removeNotification(id) {
        setTimeout(() => {
            this.notifications = this.notifications.filter(
                (notification) => notification.id !== id,
            )
        }, 400);
    },
}" x-on:toast.window="addNotification($event.detail)" id="toast-notification"
    {{ $attributes->merge(['class' => 'z-99']) }}>
    <div x-on:mouseenter="$dispatch('pause-auto-dismiss')" x-on:mouseleave="$dispatch('resume-auto-dismiss')"
        class="group pointer-events-none  inset-x-8 top-0 z-99 flex max-w-full flex-col gap-2 bg-transparent  md:bottom-6 md:right-6 left-0 relative w-fit">
        <template x-for="(notification, index) in notifications" x-bind:key="notification.id">
            <div
                class="fixed bg-background rounded-lg"
                x-bind:class="{
                    'bottom-6 right-5': notification.position=='bottom-right',
                    'bottom-6 left-5': notification.position=='bottom-left',
                    'left-1/2 -translate-x-1/2 bottom-0 sm:mb-6': notification.position=='bottom-center',
                    'top-6 right-5': notification.position=='top-right',
                    'top-6 left-5': notification.position=='top-left',
                    'left-1/2 -translate-x-1/2 top-0 sm:mt-6': notification.position=='top-center',
                }"
            >
                <div x-data="{ isVisible: false, timeout: null }" x-cloak x-show="isVisible"
                    class="pointer-events-auto bg-background relative rounded-radius border border-info bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark shadow-lg rounded-lg"
                    x-bind:class="{
                        'bg-green-200/20 border-green-500': notification.variant=='success',
                        'bg-red-200/20 border-red-500': notification.variant=='danger',
                    }"
                    role="alert" x-on:pause-auto-dismiss.window="clearTimeout(timeout)"
                    x-on:resume-auto-dismiss.window=" timeout = setTimeout(() => {(isVisible = false), removeNotification(notification.id) }, notification.duration)"
                    x-init="$nextTick(() => { isVisible = true }), (timeout = setTimeout(() => { isVisible = false, removeNotification(notification.id) }, notification.duration))" x-transition:enter="transition duration-300 ease-out"
                    x-transition:enter-end="translate-y-0" x-transition:enter-start="translate-y-8"
                    x-transition:leave="transition duration-300 ease-in"
                    x-transition:leave-end="-translate-x-24 opacity-0 md:translate-x-24"
                    x-transition:leave-start="translate-x-0 opacity-100">
                    <div
                        class="flex w-full items-center gap-2.5 bg-info/10 rounded-radius p-4 transition-all duration-300 space-x-2 hover:[&>.action]:block">
                        <div class="grid gap-1">
                            <div class="text-sm font-semibold"
                                x-bind:class="{
                                    'text-green-500': notification.variant == 'success',
                                    'text-red-500': notification.variant == 'danger',
                                }"
                                x-show="notification.title" x-html="notification.title"></div>
                            <div class="text-sm opacity-90" x-show="notification.message" x-html="notification.message">
                            </div>
                        </div>
                        <template x-if="notification.action">
                            <button type="button"
                                class="bg-background h-8 shrink-0 rounded-md border px-3 text-sm font-medium"
                                x-bind:class="{
                                    'border-green-500 text-green-500': notification.variant=='success',
                                    'border-red-500 text-red-500': notification.variant=='danger',
                                }"
                                x-html="notification.action.label"
                                x-on:click="notification.action.do();(isVisible = false), removeNotification(notification.id)">
                            </button>
                        </template>
                        <button type="button" class="ml-auto absolute right-2 top-2 opacity-50 action hidden "
                            aria-label="dismiss notification"
                            x-on:click="(isVisible = false), removeNotification(notification.id)">
                            <x-tabler-x class="h-4" />
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
