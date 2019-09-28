<!--   Core JS Files   -->
<script src="{{ asset('admin/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/core/bootstrap-material-design.min.js') }}"></script>
<!-- Plugin for the momentJs  -->
<script src="{{ asset('admin/js/plugins/moment.min.js') }}"></script>
<!--  Notifications Plugin    -->
{{-- <script src="{{ asset('admin/js/plugins/bootstrap-notify.js') }}"></script> --}}
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('admin/js/combine/material-dashboard.min.js')}}" type="text/javascript"></script>

<script>
    $(document).on('click', '.refresh', function(e){
        location.reload();
    });
</script>

