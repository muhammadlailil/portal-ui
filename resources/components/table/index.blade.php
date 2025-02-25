<div {{ $attributes->merge(['class' => 'overflow-x-auto rounded-md w-full bg-background border rounded-md']) }} 
x-data="{
    toggleSelectAll($el){
        document.querySelectorAll('.checkbox-table').forEach((element)=>element.checked=$el.target.checked)
    }    
}">
    <div class="inline-block min-w-full">
        <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-border">
                {{ $slot }}
            </table>
        </div>
    </div>
</div>
