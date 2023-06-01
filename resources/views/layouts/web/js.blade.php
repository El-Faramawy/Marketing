<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>`
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="{{url('Web')}}/assets/JS/navbar.js"></script>
<script src="{{url('Web')}}/assets/JS/signup.js"></script>
<script src="{{url('Web')}}/assets/JS/drop.js"></script>

{{--=================== default toster ==============================--}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@include('layouts.admin.inc.toaster')

@include('layouts.web.inc.ajax')

<script>
    $(document).on('keyup','.numbersOnly',function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
</script>

@stack('site_js')
