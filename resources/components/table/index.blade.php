<div {{ $attributes->merge(['class' => 'overflow-x-auto rounded-md w-full bg-background border rounded-md']) }}>
    <div class="min-w-full box-table">
        <table class="min-w-full divide-y divide-border">
            {{ $slot }}
        </table>
    </div>
</div>
