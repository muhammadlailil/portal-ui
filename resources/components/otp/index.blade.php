@props(['type' => 'number','name'=>'otp'])
<div x-data="{
    type: '{{ $type }}',
    inputName : '{{$name}}[]',
    handleInput($el) {
        const value = $el.value
        if (value) {
            if (isNaN(parseInt(value)) && this.type == 'number') {
                $el.value = ''
                return
            }
            const nextRef = this.findRefInput(Number($el.getAttribute('data-index')) + 1)
            if (nextRef) {
                nextRef.focus()
            }
        }
    },
    handlePaste(event) {
        const text = event.clipboardData.getData('Text')
        var index = Number($el.getAttribute('data-index'))
        for (let i = 0; i < text.length; i++) {
            const value = text.charAt(i)
            if (isNaN(parseInt(value)) && this.type == 'number') {
                continue
            }
            const nextRef = this.findRefInput(index)
            if (nextRef) {
                nextRef.value = value
                nextRef.focus()
            } else {
                break;
            }
            index++
        }
    },
    handleDelete($el) {
        if ($el.value) {
            $el.value = ''
        } else {
            const prevRef = this.findRefInput(Number($el.getAttribute('data-index')) - 1)
            if (prevRef) {
                prevRef.value = ''
                prevRef.focus()
            }
        }
    },
    findRefInput(index) {
        const nextInputRefName = `otp-${index}`
        return $refs[nextInputRefName]
    }
}" {{ $attributes->class(['flex items-center','pointer-events-none select-none opacity-50' => $attributes->get('disabled')]) }} {{$attributes->except(['class'])}}>
    {{ $slot }}
</div>
