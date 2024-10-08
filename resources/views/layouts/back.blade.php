<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="_token" content="{{ csrf_token() }}">
        <title>{{ $title }}</title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon"/>
    
        <!-- Fonts and icons -->
        <script src="{{ url('assets/js/plugin/webfont/webfont.min.js') }}"></script>
        <script>
            WebFont.load({
                google: {"families":["Lato:300,400,700,900"]},
                custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
    
        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/atlantis.min.css') }}">
    
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="{{ url('assets/css/demo.css') }}">
        <link rel="stylesheet" href="{{ url('vendors/ladda/ladda-themeless.min.css') }}">
        <link rel="stylesheet" href="{{ url('vendors/select2/select2.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/select2-atlantis.css') }}">
        
        @yield('styles')
    </head>

<body>

    <div class="wrapper">
		@include('layouts.header')

		@include('layouts.sidebar')

		<div class="main-panel">
			<div class="content">
				@yield('content')
			</div>
			<footer class="footer">
				@include('layouts.footer')
			</footer>
		</div>
		
	</div>

    <!--   Core JS Files   -->
	<script src="{{ url('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ url('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ url('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ url('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


	<!-- Chart JS -->
	<script src="{{ url('assets/js/plugin/chart.js/Chart.min.js') }}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

	<!-- Chart Circle -->
	<script src="{{ url('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ url('assets/js/plugin/datatables/datatables.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ url('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{ url('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ url('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ url('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<!-- Atlantis JS -->
	<script src="{{ url('assets/js/atlantis.min.js') }}"></script>

    <script src="{{ url('vendors/ladda/spin.min.js') }}"></script>
    <script src="{{ url('vendors/ladda/ladda.min.js') }}"></script>
    <script src="{{ url('vendors/ladda/ladda.jquery.min.js') }}"></script>
    <script src="{{ url('vendors/select2/select2.min.js') }}"></script>

    <script src="{{ url('assets/js/myJs.js') }}"></script>
    <script>
        $(document).ready(function() {
            var url = window.location.href;

            $('.sidebar .nav li a').each(function() {
                if (url === this.href) {
                    $(this).closest('li').addClass('active');
                    $(this).closest('ul').addClass('submenu');
                    $(this).closest('ul').parent().addClass('open');
                    $(this).closest('ul').parent().removeClass('collapse');
                    $(this).closest('ul').parent().parent().addClass('active');
                }
            });
            

        });

    </script>

    @yield('scripts')
</body>

</html>
