<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(\Illuminate\Support\Facades\Session::has('success'))
    toastr.success("{{\Illuminate\Support\Facades\Session::get('success')}}", 'Success', {timeOut: 3000});

    @endif

    @if(\Illuminate\Support\Facades\Session::has('error'))
    toastr.error('{{\Illuminate\Support\Facades\Session::get('error')}}', 'Error', {timeOut: 3000});
    @endif
</script>
