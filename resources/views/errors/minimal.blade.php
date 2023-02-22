

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
     	
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template" >
	<meta property="og:title" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template" >
	<meta property="og:description" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template" >
	<meta property="og:image" content="social-image.png" >
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Bridge Trust Finance - Dashboard</title>
	<!-- FAVICONS ICON -->
	
<link rel="shortcut icon" type="image/png" href="images/favicon.png" >
   <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('public/box/css/style.css') }}" rel="stylesheet">
    
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-7">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text fw-bold"> 
                            @yield('code')
                        </h1>
                        <h4><i class="fa fa-exclamation-triangle text-warning"></i> 
                            @yield('message')
                        </h4>
                        <p>@yield('submessage')</p>
						<div>
                            <a class="btn btn-primary" href="{{route('welcome')}}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('public/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('public/js/custom.min.js') }}"></script>
<script src="{{ asset('public/js/deznav-2-init.js') }}"></script>

</body>
</html>