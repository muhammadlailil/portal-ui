@once
    @push('css')
        <link rel="stylesheet" href="{{asset('portal-ui/module/flatpickr.css')}}">
        <script src="{{asset('portal-ui/module/flatpickr.js')}}"></script>
    @endpush
    @push('scripts')
        <script src="{{ asset('portal-ui/module/datepicker.js') }}"></script>
    @endpush
@endonce
