<!--=================================
 jquery -->

<!-- jquery -->
<script src="{{asset('dash/js/jquery-3.3.1.min.js')}}"></script>

<!-- plugins-jquery -->
<script src="{{asset('dash/js/plugins-jquery.js')}}"></script>

<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('dash/js') }}/';</script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>
<!-- chart -->
<script src="{{asset('dash/js/chart-init.js')}}"></script>

<!-- calendar -->
<script src="{{asset('dash/js/calendar.init.js')}}"></script>

<!-- charts sparkline -->
<script src="{{asset('dash/js/sparkline.init.js')}}"></script>

<!-- charts morris -->
<script src="{{asset('dash/js/morris.init.js')}}"></script>

<!-- datepicker -->
<script src="{{asset('dash/js/datepicker.js')}}"></script>

<!-- sweetalert2 -->
<script src="{{asset('dash/js/sweetalert2.js')}}"></script>

<!-- toastr -->
<script src="{{asset('dash/js/toastr.js')}}"></script>

<!-- validation -->
<script src="{{asset('dash/js/validation.js')}}"></script>

<!-- lobilist -->
<script src="{{asset('dash/js/lobilist.js')}}"></script>

<!-- custom -->
<script src="{{asset('dash/js/custom.js')}}"></script>
