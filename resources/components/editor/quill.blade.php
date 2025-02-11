@props(['name', 'height' => '450'])
<div>
    <div id="quill_editor_{{ $name }}" style="height: {{ $height }}px"
        class="!border-input rounded-b-md">
        {{ $slot }}
    </div>
    <textarea name="{{ $name }}" id="quill_editor_{{ $name }}_value" class="hidden">{{ $slot }}</textarea>
</div>
@push('scripts')
    <script>
        window.addEventListener("load",(function(){window["wysiwyg_{{ $name }}"],window["quill_{{ $name }}"]=new Quill("#quill_editor_{{ $name }}",{modules:{toolbar:[[{font:[]}],[{header:[1,2,3,4,5,6,!1]}],["bold","italic","underline","strike"],["blockquote"],[{list:"ordered"},{list:"bullet"}],[{indent:"-1"},{indent:"+1"}],[{direction:"rtl"}],[{color:[]},{background:[]}],[{align:[]}],["clean","image"]]},placeholder:"{{ $attributes->get('placeholder') }}",theme:"snow"}),window["quill_{{ $name }}"].on("text-change",(function(e,n,l){document.getElementById("quill_editor_{{ $name }}_value").value=window["quill_{{ $name }}"].container.firstChild.innerHTML}))}));
    </script>
@endpush

@include('portal::script.quill')
