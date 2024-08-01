<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset ('assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset ('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css' ) }}" rel="stylesheet" />
    <link href="{{ asset ('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css' ) }}" rel="stylesheet" />
    <link href="{{ asset ('assets/plugins/animate/animate.min.css' ) }}" rel="stylesheet" />
    <link href="{{ asset ('assets/css/default/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset ('assets/css/default/style-responsive.min.css' ) }}" rel="stylesheet" />
    <link href="{{ asset ('assets/css/default/theme/default.css' ) }}" rel="stylesheet" id="theme" />
    <link href="{{ asset ('assets/css/select2/select2.min.css' ) }}" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset ('assets/plugins/jquery-jvectormap/jquery-jvectormap.css' ) }}" rel="stylesheet" />
    <link href="{{ asset ('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css' ) }}" rel="stylesheet" />
    <link href="{{ asset ('assets/plugins/gritter/css/jquery.gritter.css' ) }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset ('assets/plugins/pace/pace.min.js')  }}"></script>
    <!-- ================== END BASE JS ================== -->
    <link href="{{ asset ('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{ asset ('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
    <!-- <link href="{{ asset ('assets/plugins/fullcalendar/fullcalendar.print.css') }}" rel="stylesheet" media='print' /> -->
	<!-- <link href="{{ asset ('assets/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" /> -->
</head>

<body class="antialiased">
    <!-- begin #page-loader -->
    <!-- <div id="page-loader" class="fade show"><span class="spinner"></span></div> -->
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed show">
        <div id="app"></div>
    </div>
    <!-- ================== BEGIN BASE JS ================== -->
    @vite(['resources/js/app.js'])

    
<script src="{{ asset ('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset ('assets/js/theme/default.min.js') }}"></script>
<script src="{{ asset ('assets/js/apps.min.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset ('assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
<script src="{{ asset ('assets/plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/flot/jquery.flot.stack.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/flot/jquery.flot.crosshair.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/flot/jquery.flot.categories.js') }}"></script>
<script src="{{ asset ('assets/plugins/sparkline/jquery.sparkline.js') }}"></script>
<script src="{{ asset ('assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset ('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset ('assets/js/demo/dashboard.min.js') }}"></script>
<script src="{{ asset ('assets/js/demo/chart-flot.demo.min.js')}}"></script>
<script src="{{ asset ('assets/js/demo/table-manage-responsive.demo.min.js')}} "></script>
<script src="{{ asset ('assets/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset ('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>


<script src="{{ asset ('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset ('assets/js/demo/ui-modal-notification.demo.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js"></script>
<script src="{{ asset ('assets/plugins/nvd3/build/nv.d3.js') }}"></script>
<script src="{{ asset ('assets/js/demo/chart-d3.demo.min.js')}}"></script>



    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
    $(document).ready(function() {
        App.init();
        Dashboard.init();
        TableManageResponsive.init();
        // Calendar.init();?
		Notification.init();



    });
    </script>
</body>

</html>