@props(['name', 'icon' => 'file', 'accept', 'description' => null, 'maxsize' => 0])
<div x-data="{
    filename: '',
    filesize: '',
    maxFileSize: Number('{{ $maxsize }}'),
    listenerFileChange($el, $event) {
        const files = $el.files
        const file = files[0]
        if (file) {
            const fileType = file.type
            if (this.maxFileSize > 0 && file.size / 1000000 > Number(this.maxFileSize)) {
                alert(`File size cannot be more than ${this.maxFileSize}MB`)
                $el.value = '';
                this.filename = ''
                this.filesize = ''
                return
            }
            const acceptedTypes = $el.getAttribute('accept').split(',');
            const fileTypeValid = acceptedTypes.some(type => {
                if (type.includes('*')) {
                    return file.type.startsWith(type.split('/')[0]);
                }
                return file.type === type;
            });
            if (!fileTypeValid) {
                alert('File format is invalid')
                $el.value = '';
                this.filename = ''
                this.filesize = ''
                return
            }

            this.filename = file.name
            this.filesize = this.formatFileSize(file.size);
        } else {
            this.filename = ''
            this.filesize = ''
        }
    },
    dropListener($el, $event) {
        $el.classList.remove('border-primary', 'border-solid')
    },
    formatFileSize(size) {
        const units = ['B', 'KB', 'MB', 'GB', 'TB'];
        let i = 0;
        while (size >= 1024 && i < units.length - 1) {
            size /= 1024;
            i++;
        }
        return size.toFixed(2) + ' ' + units[i];
    }
}">
    <div {{ $attributes->merge(['class' => 'relative w-[400px] h-[100px] border-2 border-dashed rounded-md border-input flex cursor-pointer']) }}
        x-on:dragover="$el.classList.add('border-primary','border-solid')"
        x-on:dragleave="$el.classList.remove('border-primary','border-solid')" x-on:drop="dropListener($el,$event)">
        <div class="w-[25%] h-full border-r-2 border-dashed flex items-center justify-center shrink-0">
            @svg('tabler-' . $icon, [
                'class' => 'h-12 w-12 text-primary',
            ])
        </div>
        <div class="grid items-center  p-3">
            <x-portal::label class="text-gray-500 truncate pb-[3px]">
                <span x-show="!filename" x-cloak>
                    Drag and drop a file or click to browse
                </span>
                <span x-show="filename" x-cloak x-html="filename"></span>
            </x-portal::label>
            <x-portal::label class="text-xs text-gray-500">
                <span x-show="!filesize" x-cloak>
                    {{ $description ?: 'Please upload your file here' }}
                </span>
                <span x-show="filesize" x-cloak x-html="filesize"></span>
            </x-portal::label>
        </div>

        <input type="file" x-ref="inputFile" name="{{ $name }}" accept="{{ $accept }}"
            class="absolute h-full w-full opacity-0 cursor-pointer" x-on:change="listenerFileChange($el,$event)"
            {{ $attributes->get('required') ? 'required' : '' }} />
    </div>
</div>
