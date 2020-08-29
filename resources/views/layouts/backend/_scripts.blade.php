<!-- Essential javascripts for application to work-->
<script src="{{ asset('assets/js/backend/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/backend/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/backend/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/backend/main.js') }}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{ asset('assets/js/backend/plugins/pace.min.js') }}"></script>
{{-- Toastr js --}}
<script src="{{ asset('assets/js/backend/toastr/toastr.min.js') }}"></script>

<!-- Google analytics script-->
<script type="text/javascript">

</script>
<!-- Google analytics script-->

{{-- Toastr configuration js start --}}
<script type="text/javascript">
	toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
{{-- Toastr configuration js end --}}

@stack('js')
@stack('customJs')
{{-- To show toastr message everywhere --}}
{!! Toastr::message() !!}
{{-- To show toastr message everywhere --}}