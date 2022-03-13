<!-- jQuery 3 -->


<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/') }}/assets/vendor_components/jquery-ui/jquery-ui.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- popper -->
<script src="{{ asset('backend/') }}/assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- date-range-picker -->
<script src="{{ asset('backend/') }}/assets/vendor_components/moment/min/moment.min.js"></script>
<script src="{{ asset('backend/') }}/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Bootstrap 4.0-->
<script src="{{ asset('backend/') }}/assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

<!-- ChartJS -->
<script src="{{ asset('backend/') }}/assets/vendor_components/chart.js-master/Chart.min.js"></script>

<!-- Slimscroll -->
<script src="{{ asset('backend/') }}/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- FastClick -->
<script src="{{ asset('backend/') }}/assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- Morris.js charts -->
<script src="{{ asset('backend/') }}/assets/vendor_components/raphael/raphael.min.js"></script>
<script src="{{ asset('backend/') }}/assets/vendor_components/morris.js/morris.min.js"></script>

<!-- Bootstrap Select -->
<script src="{{ asset('backend/') }}/assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<!-- This is data table -->
<script src="{{ asset('backend/') }}/assets/vendor_components/datatable/datatables.min.js"></script>

<!-- Superieur Admin App -->
<script src="{{ asset('backend/') }}/js/template.js"></script>

<!-- Superieur Admin dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/') }}/js/pages/dashboard.js"></script>

<!-- Superieur Admin for demo purposes -->
<script src="{{ asset('backend/') }}/js/demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- date-range-picker -->
<script src="{{ asset('backend/') }}/assets/vendor_components/moment/min/moment.min.js"></script>
<script src="{{ asset('backend/') }}/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- bootstrap datepicker -->
<script src="{{ asset('backend/') }}/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<!-- Form validator JavaScript -->
<script src="{{ asset('backend/') }}/js/pages/validation.js"></script>
<script src="{{ asset('backend/') }}/js/pages/form-validation.js"></script>

<!-- This is data table -->
<script src="{{ asset('backend/') }}/assets/vendor_components/datatable/datatables.min.js"></script>

<!-- Superieur Admin for Data Table -->
<script src="{{ asset('backend/') }}/js/pages/data-table.js"></script>

<!-- Toastr JS -->
<script src="{{ asset('backend/assets/toastr.min.js') }}"></script>
<script type="text/javascript">
    @if(Session::has('message'))
     let type = "{{ Session::get('alert-type', 'info') }}"
     switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

          case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif
</script>

<!-- SweetAlert2 -->
<script src="{{ asset('backend/assets/sweetalert2@11.js') }}"></script>
<script src="{{ asset('backend/assets/custom.js') }}"></script>



