<!--   Core JS Files   -->
<script src="{{ asset('admin/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<!-- Plugin for the momentJs  -->
<script src="{{ asset('admin/js/plugins/moment.min.js') }}"></script>
<!-- Chartist JS -->
<script src="{{ asset('admin/js/plugins/chartist.min.js') }}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('admin/js/plugins/jquery-jvectormap.js') }}"></script>
<!-- Library for adding dinamically elements -->
<script src="{{ asset('admin/js/plugins/arrive.min.js') }}"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('admin/js/material-dashboard.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();

        md.initVectorMap();

    });
</script>

