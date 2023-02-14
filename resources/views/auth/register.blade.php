<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
     	
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template" >
	<meta property="og:title" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template" >
	<meta property="og:description" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template" >
	<meta property="og:image" content="social-image.png" >
	<meta name="format-detection" content="telephone=no">
	<!-- PAGE TITLE HERE -->
	<title>Bridge Trust Finance - Dashboard</title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('public/images/logo-full.png') }}" >
	<link href="public/vendor/wow-master/css/libs/animate.css" rel="stylesheet">
	<link href="public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="public/vendor/bootstrap-select-country/css/bootstrap-select-country.min.css">
	<link rel="stylesheet" href="public/vendor/jquery-nice-select/css/nice-select.css">
	<!--swiper-slider-->
	<link rel="stylesheet" href="public/vendor/swiper/css/swiper-bundle.min.css">
	<link href="public/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<!-- Style css -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
	<style>
		html, body{
			background: #7B1001;
		}
		#login{
			background: #7B1001;
		}
	</style>

</head>

<body class="body  h-100">
	<div class="container-fluid h-100">
		<div class="row h-100 align-items-center justify-contain-center">
			<div class="col-xl-12">
				<div class="card main-width">
					<div class="card-body  p-0">
						<div class="row m-0">
							<div class="col-xl-5 col-lg-5">
								<div class="card">
									<div class="card-body">								
										<div class="d-flex align-items-center justify-content-between mb-4">
										<a href="index.html">
                                            <div class="menu-icon">
                                                <img width="65" src="{{ asset('public/images/logo-full.png') }}" alt="" srcset="">
                                            </div>
										</a>
											{{-- <span class="mt-xl-0 mt-3"><a href="javascript:void(0);" class="text-primary font-w500">Try For Free</a></span> --}}
										</div>
										<h2>Welcome</h2>
										<span>Create your account today.</span>
										<x-jet-validation-errors class="mb-4" style="color:red" />
										<form class="mt-4" method="POST" action="{{ route('register') }}">
											@csrf
											
                                            <div class="form-group mb-4">
                                                <label for="exampleInputEmail1">First Name</label>
                                                <input name="fname" :value="old('fname')"  type="text" class="form-control" id="exampleInputname"  placeholder="Enter User Name">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="exampleInputEmail1">Last Name</label>
                                                <input name="lname" :value="old('lname')"  type="text" class="form-control" id="exampleInputname"  placeholder="Enter User Name">
                                            </div>
										  <div class="form-group mb-4">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" name="email" :value="old('email')" required  class="form-control" id="exampleInputEmail1"  placeholder="Enter Email">
										  </div>
										  <div class="form-group mb-4">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" id="password" name="password" required autocomplete="new-password" class="form-control" id="exampleInputPassword1" placeholder="Password">
										  </div>
										  <div class="form-group mb-4">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"" class="form-control" id="exampleInputPassword1" placeholder="Re-type Password">
										  </div>
                                         
										  <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap"> 
											{{-- <div class="form-check">
												<input type="checkbox" class="form-check-input" id="exampleCheck1">
												<label class="form-check-label font-w400" for="exampleCheck1">keep me signed in</label>
											</div> --}}
											@if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
											<div class="form-check">
												<input type="checkbox" name="terms" class="form-check-input" id="termsCheckbox">
												<label class="form-check-label font-w400" for="termsCheckbox">{!! __('I agree to the :terms_of_service and :privacy_policy', [
													'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
													'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
												]) !!}</label>
											</div>
											@endif
											  
										 </div>
                                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign me up</button>
										</form>
										  {{-- <div class="position-relative social-log text-center mb-4">
											<span>Or,log in with your email</span>
										  </div> --}}
                                            {{-- <div class="text-center mb-4">	
                                                <button class="btn btn-outline-light text-center">
                                                    
                                                    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                    <svg version="1.1" width="20" height="20" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                    <path style="fill:#167EE6;" d="M492.668,211.489l-208.84-0.01c-9.222,0-16.697,7.474-16.697,16.696v66.715
                                                        c0,9.22,7.475,16.696,16.696,16.696h117.606c-12.878,33.421-36.914,61.41-67.58,79.194L384,477.589
                                                        c80.442-46.523,128-128.152,128-219.53c0-13.011-0.959-22.312-2.877-32.785C507.665,217.317,500.757,211.489,492.668,211.489z"/>
                                                    <path style="fill:#12B347;" d="M256,411.826c-57.554,0-107.798-31.446-134.783-77.979l-86.806,50.034
                                                        C78.586,460.443,161.34,512,256,512c46.437,0,90.254-12.503,128-34.292v-0.119l-50.147-86.81
                                                        C310.915,404.083,284.371,411.826,256,411.826z"/>
                                                    <path style="fill:#0F993E;" d="M384,477.708v-0.119l-50.147-86.81c-22.938,13.303-49.48,21.047-77.853,21.047V512
                                                        C302.437,512,346.256,499.497,384,477.708z"/>
                                                    <path style="fill:#FFD500;" d="M100.174,256c0-28.369,7.742-54.91,21.043-77.847l-86.806-50.034C12.502,165.746,0,209.444,0,256
                                                        s12.502,90.254,34.411,127.881l86.806-50.034C107.916,310.91,100.174,284.369,100.174,256z"/>
                                                    <path style="fill:#FF4B26;" d="M256,100.174c37.531,0,72.005,13.336,98.932,35.519c6.643,5.472,16.298,5.077,22.383-1.008
                                                        l47.27-47.27c6.904-6.904,6.412-18.205-0.963-24.603C378.507,23.673,319.807,0,256,0C161.34,0,78.586,51.557,34.411,128.119
                                                        l86.806,50.034C148.202,131.62,198.446,100.174,256,100.174z"/>
                                                    <path style="fill:#D93F21;" d="M354.932,135.693c6.643,5.472,16.299,5.077,22.383-1.008l47.27-47.27
                                                        c6.903-6.904,6.411-18.205-0.963-24.603C378.507,23.672,319.807,0,256,0v100.174C293.53,100.174,328.005,113.51,354.932,135.693z"/>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    </svg>

                                                    Sign In With Google</button>
                                            </div> --}}
										<div class="text-center">
											<p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-7 col-lg-7 position-relative bg-secondary login-border" style="background-image: url('{{ asset("public/box/images/about.jpg") }}');">
								<div class="d-flex flex-column justify-content-between h-100">
									<div class="content text-center py-4">
										<h2 class="text-white mb-0">Welcome To Brige Trust Finance.</h2>
										<p class="text-white">Your number one lending platform</p>
									</div>
									<div class="login-media-1">
										{{-- <img src="https://img.freepik.com/premium-vector/funding-small-business-backing-startup-project-banking-loan-start-new-business-investment_566886-6085.jpg?w=740" alt=""> --}}
										<svg class="dot-svg" width="40" height="40" viewBox="0 0 89 90" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="2.5" cy="2.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="2.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="2.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="2.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="2.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="2.5" cy="87.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="87.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="87.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="87.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="87.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="2.5" cy="70.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="70.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="70.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="70.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="70.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="2.5" cy="19.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="19.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="19.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="19.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="19.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="2.5" cy="36.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="36.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="36.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="36.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="36.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="2.5" cy="53.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="53.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="53.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="53.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="53.5" r="2.5" fill="#D9D9D9"/>
											</svg>
											<svg class="dot-svg-end" width="40" height="40" viewBox="0 0 89 90" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="2.5" cy="2.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="2.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="2.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="2.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="2.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="2.5" cy="87.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="87.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="87.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="87.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="87.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="2.5" cy="70.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="70.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="70.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="70.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="70.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="2.5" cy="19.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="19.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="19.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="19.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="19.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="2.5" cy="36.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="36.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="36.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="36.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="36.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="2.5" cy="53.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="23.5" cy="53.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="44.5" cy="53.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="65.5" cy="53.5" r="2.5" fill="#D9D9D9"/>
											<circle cx="86.5" cy="53.5" r="2.5" fill="#D9D9D9"/>
											</svg>

									<svg class="t-svg" width="50" height="50" viewBox="0 0 192 169" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M61.5393 0.840397L191.627 0.840258L101.714 168.846L-4.87743e-05 113.076L61.5393 0.840397Z" fill="#2696FD" fill-opacity="0.22"/>
									</svg>
										
									</div>
									{{-- <div class="login-media-2">
										<img src="https://img.freepik.com/premium-vector/interest-rate-system-vector-illustration_353502-455.jpg?w=740" alt="">
									</div>
									<div class="d-flex align-items-center justify-content-between text-white pb-3 px-2">
										<span><a href="javascript:void(0);" class="text-white d-xl-block d-none">Privacy policy and Terms of use</a></span>
										<span class="text-center"><a href="javascript:void(0);" class="text-white">Copyright © Designed &amp; Prowered by</a> <a class="text-white" href="https://greenwebb.com/" target="_blank">Green webb </a> 2023</span>
										<span><a href="javascript:void(0);" class="text-white d-xl-block d-none"> Privacy policy</a></span>
									</div> --}}
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required public/vendors -->
    <script src="public/vendor/global/global.min.js"></script>
   
	
	
</body>
</html>