<div {{ $attributes->merge(['class' => 'overflow-x-auto rounded-md w-full bg-background border rounded-md']) }} >
    <div class="inline-block min-w-full box-table">
        <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-border">
                {{ $slot }}
            </table>
        </div>
    </div>
</div>
