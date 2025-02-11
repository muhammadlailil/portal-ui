@props(['name', 'description' => null, 'maxsize' => 0, 'compress' => true])
<div x-data="{
    preview: '',
    maxFileSize: Number('{{ $maxsize }}'),
    listenerFileChange($el, $event) {
        const files = $el.files
        const file = files[0]
        if (file) {
            const fileType = file.type
            if (this.maxFileSize >0 && file.size / 1000000 > Number(this.maxFileSize)) {
                alert(`File size cannot be more than ${this.maxFileSize}MB`)
                $el.value = '';
                this.preview = ''
                return
            }
            if (!fileType.includes('image/')) {
                alert('File is not falid image file')
                $el.value = '';
                this.preview = ''
                return
            }
            let output = 'jpeg'
            if (fileType.includes('/png')) {
                output = fileType
            }
            this.preview = URL.createObjectURL(file)
        } else {
            this.preview = ''
        }
    },
    dropListener($el, $event) {
        $el.classList.remove('border-primary', 'border-solid')
    }
}">
    <div {{ $attributes->merge(['class' => 'border-2 border-dashed bg-center bg-contain bg-no-repeat border-gray-200 relative rounded-lg flex flex-col gap-1 p-6 items-center text-center justify-center cursor-pointer w-[400px] h-[150px]']) }}
       x-on:dragover="$el.classList.add('border-primary','border-solid')"
        x-on:dragleave="$el.classList.remove('border-primary','border-solid')" x-on:drop="dropListener($el,$event)"
        x-bind:style="{ backgroundImage: `url(${preview})` }">
        <x-tabler-photo class="mb-2 h-8 w-8" x-bind:class="{ 'opacity-50': preview }" />
        <x-portal::label class="text-gray-500" x-bind:class="{ 'opacity-50': preview }">
            Drag and drop a file or click to browse
        </x-portal::label>
        <x-portal::label class="text-xs text-gray-500" x-bind:class="{ 'opacity-50': preview }">
            {{ $description ?: "Only image format are accepted, up to {$maxsize}MB" }}
        </x-portal::label>
        <input type="file" x-ref="inputFile" name="{{ $name }}" accept="image/*"
            class="absolute h-full w-full opacity-0 cursor-pointer" x-on:change="listenerFileChange($el,$event)"
            {{ $attributes->get('required') ? 'required' : '' }} />
    </div>
</div>
