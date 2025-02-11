@props(['name', 'remove' => '', 'height' => '450', 'uploadUrl' => url('ckeditor/upload')])
<textarea name="{{ $name }}" id="ckeditor_{{ $name }}"
    {{ $attributes->merge(['class' => 'hidden editor-ckeditor']) }}>{{ $slot }}</textarea>
@push('scripts')
    <script>
        window.addEventListener("load",(function(){CKEDITOR.disableAutoInline=!0,CKEDITOR.config.height="{{ $height }}",window["ckeditor_{{ $name }}"]=CKEDITOR.replace("ckeditor_{{ $name }}",{filebrowserUploadUrl:"{{ $uploadUrl }}",removeButtons:"{{ $remove }}",editorplaceholder:"{{ $attributes->get('placeholder') }}",on:{instanceReady:function(e){e.editor.container.$.classList.add("rounded-md","overflow-hidden","!border-input")},fileUploadRequest:function(e){e.data.fileLoader.xhr.setRequestHeader("X-CSRF-TOKEN",document.querySelector('meta[name="csrf-token"]').content)}}})}));
    </script>
@endpush

@include('portal::script.ckeditor')
