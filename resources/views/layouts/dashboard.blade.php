<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="robots" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template">
        <meta property="og:title" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template">
        <meta property="og:description" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template">
        <meta property="og:image" content="social-image.png">
        <meta name="format-detection" content="telephone=no">
        <!-- PAGE TITLE HERE -->
        <title>Bridge Trust Finance - Dashboard</title>
        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('public/images/logo-full.png') }}">
        <link href="{{ asset('public/vendor/wow-master/css/libs/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap-select-country/css/bootstrap-select-country.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/vendor/jquery-nice-select/css/nice-select.css') }}">
        <!--swiper-slider-->
        <link rel="stylesheet" href="{{ asset('public/vendor/swiper/css/swiper-bundle.min.css') }}">
        <link href="{{ asset('public/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
        <!-- Form step -->
        <link href="{{ asset('public/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css') }}" rel="stylesheet">
        <!-- Datatable -->
        <link href="{{ asset('public/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
        <!-- Style css -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    
        @livewireStyles

        <!-- Scripts -->
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    </head>

    <body class="dark-mode">
        <div id="main-wrapper" class="wallet-open active show">
   
            {{-- @include('livewire.components.preloader') --}}
            <div id="preloader">
                <div class="loader"></div>
            </div>
            @include('livewire.components.logo')
            
            @include('livewire.components.chatbox')
            
            @include('layouts.menu-dash')
            
            @include('livewire.components.side')
            
                <!-- Page Content -->
                <div>
                    {{ $slot }}}
                </div>
            {{-- </div> --}}

            @stack('modals')

            @livewireScripts
		<div class="footer">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a href="https://dexignzone.com/" target="_blank">Greenwebb</a> 2023</p>
			</div>
		</div>
	</div>
	<!-- Required public/vendors -->
	<script src="{{ asset('public/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('public/vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<!-- Apex Chart -->
	<script src="{{ asset('public/vendor/apexchart/apexchart.js') }}"></script>
	<!-- Chart piety plugin files -->
	<script src="{{ asset('public/vendor/peity/jquery.peity.min.js') }}"></script>
	<script src="{{ asset('public/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
	<!--swiper-slider-->
	<script src="{{ asset('public/vendor/swiper/js/swiper-bundle.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('public/vendor/toastr/js/toastr.min.js') }}"></script>
    <!-- All init script -->
    <script src="{{ asset('public/js/plugins-init/toastr-init.js') }}"></script>
	<!-- Date-picker -->
	<script src="{{ asset('public/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
	<script src="{{ asset('public/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	
    <!-- Datatable -->
    <script src="{{ asset('public/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins-init/datatables.init.js') }}"></script>

	<!-- public/vendorboard 1 -->
	<script src="{{ asset('public/js/dashboard/dashboard-1.js') }}"></script>
	<script src="{{ asset('public/vendor/wow-master/dist/wow.min.js') }}"></script>
	<script src="{{ asset('public/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
	<script src="{{ asset('public/vendor/bootstrap-select-country/js/bootstrap-select-country.min.js') }}"></script>
	<!-- Form Steps -->
	<script src="{{ asset('public/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js') }}"></script>
    
	<script src="{{ asset('public/js/deznav-2-init.js') }}"></script>
	<script src="{{ asset('public/js/custom.min.js') }}"></script>
	<script src="{{ asset('public/js/demo-2.js') }}"></script>
	<script>
		$(function() {
			$('#datetimepicker').datetimepicker({
				inline: true,
			});
		});

		$(document).ready(function() {
			// SmartWizard initialize
			$('#smartwizard').smartWizard();
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                if($('button.sw-btn-next').hasClass('disabled')){
                    $('.sw-btn-group-extra').show(); // show the button extra only in the last page
                }else{
                    $('.sw-btn-group-extra').hide();				
                }

            });
			$(".booking-calender .fa.fa-clock-o").removeClass(this);
			$(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
		});
	</script>

</body>

</html>
