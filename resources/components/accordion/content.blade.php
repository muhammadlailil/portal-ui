<div 
     x-show="expanded==id" x-collapse x-cloak
     {{ $attributes->merge(['class' => 'text-sm']) }}
>
     <div class="pb-4 pt-0">
          {{ $slot }}
     </div>
</div>