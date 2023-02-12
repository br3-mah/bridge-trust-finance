
    {{-- @if($modal) --}}
    @include('livewire.parts.application-form');
    {{-- @endif --}}
    <!--Main Slider Start-->
    <section class="main-slider main-slider-style1">
        <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
            "effect": "fade",
            "pagination": {
            "el": "#main-slider-pagination",
            "type": "bullets",
            "clickable": true
            },
            "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": {
            "delay": 5000
            }}'>
            <div class="swiper-wrapper">
                <div class="slider-buttom-box">
                    <a class="style2" href="#">Make Payment <span class="icon-play-button"></span></a>
                    <a href="{{route('contact')}}">Make an Enquiry <span class="icon-play-button"></span></a>
                </div>

                <!--Start Single Swiper Slide-->
                <div class="swiper-slide">
                    <div class="image-layer" style="background-image: url('{{ asset("public/box/images/slides/slide-v1-1.jpg") }}');">
                    </div>
                    <div class="main-slider-style1__shape1" style="background-image: url('{{ asset("public/box/images/shapes/slidear-1-shape-1.png") }}');">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="main-slider-content">
                                    <div class="main-slider-content__inner">
                                        <div class="big-title">
                                            <h2>Eduction Loans</h2>
                                            <!-- <h2>Loan Financing with the<br> Happiest Customers<br> in the World</h2> -->
                                        </div>
                                        <div class="text">
                                            <p>
                                                Realize your dreams for the future
                                            </p>
                                        </div>
                                        <div class="btns-box">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn-one" href="#staticBackdrop">
                                                <span class="txt">
                                                    Apply Now
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Swiper Slide-->

                <!--Start Single Swiper Slide-->
                <div class="swiper-slide">
                    <div class="image-layer" style="background-image: url('{{ asset("public/box/images/slides/slide-v1-2.jpg") }}');">
                    </div>
                    <div class="main-slider-style1__shape1" style="background-image: url('{{ asset("public/box/images/shapes/slider-1-shape-1.png") }}');">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="main-slider-content">
                                    <div class="main-slider-content__inner">
                                        <div class="big-title">
                                            <h2>Asset Financing<br>Loans</h2>
                                        </div>
                                        <div class="text">
                                            <p>
                                                Let us get sort out your asset and 
                                                equipment finance so you can get on with running your business.
                                            </p>
                                        </div>
                                        <div class="btns-box">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn-one" href="#staticBackdrop">
                                                <span class="txt">
                                                    Apply Now
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Swiper Slide-->

                <!--Start Single Swiper Slide-->
                <div class="swiper-slide">
                    <div class="image-layer" style="background-image: url('{{ asset("public/box/images/slides/slide-v1-3.jpg") }}');">
                    </div>
                    <div class="main-slider-style1__shape1" style="background-image: url('{{ asset("public/box/images/shapes/slider-1-shape-1.png") }}');">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="main-slider-content">
                                    <div class="main-slider-content__inner">
                                        <div class="big-title">
                                            <h2>Personal<br> loans</h2>
                                        </div>
                                        <div class="text">
                                            <p>
                                                When you need some extra cash, turn to a personal line of credit. 
                                                It's instant access to available credit, it's flexible, and it's there as you need it.
                                            </p>
                                        </div>
                                        <div class="btns-box">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn-one" href="#staticBackdrop">
                                                <span class="txt">
                                                    Apply Now
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Swiper Slide-->


            </div>

            <!-- If we need navigation buttons -->
            <div class="main-slider__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                    <i class="icon-chevron left"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                    <i class="icon-chevron right"></i>
                </div>
            </div>

        </div>
    </section>
    <!--Main Slider End-->

    <!--Start Features Style1 Area-->
    <section class="features-style1-area">
        <div class="container">
            <div class="sec-title text-center">
                <h2>Financing for a Better Tomorrow</h2>
                <div class="sub-title">
                    <p>Our Services.</p>
                </div>
            </div>
            <div class="features-style1-content">
                <ul class="clearfix">
                    <!--Start Single Features Style1 Box-->
                    <li>
                        <div class="single-features-style1-box">
                            <div class="shape-left">
                                <img src="{{ asset("public/box/images/shapes/shape-1.png") }}" alt="">
                            </div>
                            <div class="shape-bottom">
                                <img src="{{ asset("public/box/images/shapes/shape-2.png") }}" alt="">
                            </div>
                            <div class="counting-box">
                                <div class="counting-box-bg" style="background-image: url('{{ asset("public/box/images/shapes/counting-box-bg.png") }}');"></div>
                                <h3>01</h3>
                            </div>
                            <div class="text-box">
                                <h4>Personal Loans</h4>
                                <h3>Get the low rate<br>you deserve.</h3>
                                <p>At Mighty Trust Finance we believe in one thing: getting a personal loan should be Simply Smart!</p>
                                <div class="btn-box">
                                    <a href="{{ route('view-personal-loans') }}">
                                        Read More
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--End Single Features Style1 Box-->
                    <!--Start Single Features Style1 Box-->
                    <li>
                        <div class="single-features-style1-box">
                            <div class="shape-left">
                                <img src="{{asset('public/box/images/shapes/shape-1.png')}}" alt="">
                            </div>
                            <div class="shape-bottom">
                                <img src="{{ asset('public/box/images/shapes/shape-2.png') }}" alt="">
                            </div>
                            <div class="counting-box">
                                <div class="counting-box-bg" style="background-image: url('{{ asset("public/box/images/shapes/counting-box-bg.png") }}');"></div>
                                <h3>02</h3>
                            </div>
                            <div class="text-box">
                                <h4>Educational Loans</h4>
                                <h3>Your dream university can be your reality</h3>
                                <p>
                                    Why should money stand in the way of the future? A simple way to fund your dreams is by 
                                    obtaining an education loan. 
                                </p>
                                <div class="btn-box">
                                    <a href="{{ route('view-educational-loans') }}">
                                        Read More
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--End Single Features Style1 Box-->
                    <!--Start Single Features Style1 Box-->
                    <li>
                        <div class="single-features-style1-box">
                            <div class="shape-left">
                                <img src="{{ asset('public/box/images/shapes/shape-1.png') }}" alt="">
                            </div>
                            <div class="shape-bottom">
                                <img src="{{ asset('public/box/images/shapes/shape-2.png') }}" alt="">
                            </div>
                            <div class="counting-box">
                                <div class="counting-box-bg" style="background-image: url('{{ asset("public/box/images/shapes/counting-box-bg.png") }}');"></div>
                                <h3>03</h3>
                            </div>
                            <div class="text-box">
                                <h4>Asset Loans</h4>
                                <h3>Our Strategies for <br>Better Returns</h3>
                                <p>Use your assets such as property, securities and rental income,
                                or even your salary account and credit card to get affordable loans.</p>
                                <div class="btn-box">
                                    <a href="{{ route('view-asset-loans') }}">
                                        Read More
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--End Single Features Style1 Box-->
                </ul>
            </div>
        </div>
    </section>
    <!--End Features Style1 Area-->

    <!--Start Service Style1 Area-->
    <section class="service-style1-area">
        <div class="service-style1-bg" style="background-image: url('{{ asset("public/box/images/backgrounds/service-style1.jpg") }}');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="service-style1-title">
                        <div class="sec-title">
                            <h2>Financing For Your Needs</h2>
                            <div class="sub-title">
                                <p>The Institution that builds better relationships.</p>
                            </div>
                        </div>
                        <div class="get-assistant-box">
                            {{-- <a href="#"><span class="icon-chatting"></span></a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="service-style1-tab">
                        <!--Start Service Style1 Tab Button-->
                        <div class="service-style1-tab__button">
                            <ul class="tabs-button-box clearfix">
                                <li data-tab="#individuals" class="tab-btn-item">
                                    <div class="inner">
                                        <div class="left">
                                            <h4>Financing for</h4>
                                            <h3>Individuals</h3>
                                        </div>
                                        <div class="right">
                                            <span class="icon-down-arrow"></span>
                                        </div>
                                    </div>
                                </li>
                                <li data-tab="#companies" class="tab-btn-item active-btn-item">
                                    <div class="inner">
                                        <div class="left">
                                            <h4>Financing for</h4>
                                            <h3>Companies</h3>
                                        </div>
                                        <div class="right">
                                            <span class="icon-down-arrow"></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--End Service Style1 Tab Button-->

                        <!--Start Tabs Content Box-->
                        <div class="tabs-content-box">

                            <!--Tab-->
                            <div class="tab-content-box-item" id="individuals">
                                <div class="service-style1-tab-content-box-item">
                                    <div class="row">
                                        <!--Start Single Service Box Style1-->
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="single-service-box-style1">
                                                <div class="icon">
                                                    <span class="icon-safebox"></span>
                                                </div>
                                                <h3><a href="#">Personal Loans</a></h3>
                                                <div class="border-box"></div>
                                                <p>Good credit means a great rate. Got good credit? Get a low-interest, 
                                                    fixed-rate personal loan</p>
                                                <h6><span>*</span> Interest rate up to 5% p.a</h6>
                                                <div class="btn-box">
                                                    <a href="{{ route('view-personal-loans') }}"><span class="icon-right-arrow"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Service Box Style1-->
                                        <!--Start Single Service Box Style1-->
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="single-service-box-style1">
                                                <div class="icon">
                                                    <span class="icon-loan"></span>
                                                </div>
                                                <h3><a href="#">Educational Loans</a></h3>
                                                <div class="border-box"></div>
                                                <p>
                                                    An education loan can assist you in gaining admission to the university of your interest. 
                                                </p>
                                                <h6><span>*</span> Check today’s Interest Rates</h6>
                                                <div class="btn-box">
                                                    <a href="{{ route('view-educational-loans') }}"><span class="icon-right-arrow"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Service Box Style1-->
                                        <!--Start Single Service Box Style1-->
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="single-service-box-style1">
                                                <div class="icon">
                                                    <span class="icon-online"></span>
                                                </div>
                                                <h3><a href="#">Women in Business Loans</a></h3>
                                                <div class="border-box"></div>
                                                <p>Bridge Trust Finance helps women entrepreneurs 
                                                    launch new businesses and compete in the marketplace. 
                                                    Connect with the training and funding opportunities 
                                                    specifically for women.
                                                </p>
                                                <br>
                                                <h6><span>*</span> Terms & Conditions</h6>
                                                <div class="btn-box">
                                                    <a href="{{ route('view-wib-loans') }}"><span class="icon-right-arrow"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Service Box Style1-->
                                        <!--Start Single Service Box Style1-->
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="single-service-box-style1">
                                                <div class="icon">
                                                    <span class="icon-online"></span>
                                                </div>
                                                <h3><a href="#">Home Improvement Loans</a></h3>
                                                <div class="border-box"></div>
                                                <p>Turn your dream of owning a home into reality with Mighty Trust Finance Home Loans. Whether you are 
                                                    buying an apartment, constructing a house or renovating your home, 
                                                    we have the right Home Loan for you.</p>
                                                <br>
                                                <h6><span>*</span> Terms & Conditions</h6>
                                                <div class="btn-box">
                                                    <a href="{{ route('view-home-loans') }}"><span class="icon-right-arrow"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Service Box Style1-->
                                    </div>
                                </div>
                            </div>

                            <!--Tab-->
                            <div class="tab-content-box-item tab-content-box-item-active" id="companies">
                                <div class="service-style1-tab-content-box-item">
                                    <div class="row">
                                        <!--Start Single Service Box Style1-->
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="single-service-box-style1">
                                                <div class="icon">
                                                    <span class="icon-safebox"></span>
                                                </div>
                                                <h3><a href="#">SMEs Loans</a></h3>
                                                <div class="border-box"></div>
                                                <p>Small business loans provide financing to help business owners launch, run and grow their businesses.</p>
                                                {{-- <h6><span>*</span> Interest rate up to 5% p.a</h6> --}}
                                                <div class="btn-box">
                                                    <a href="{{ route('view-sme-loans') }}"><span class="icon-right-arrow"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Service Box Style1-->
                                        
                                        <!--Start Single Service Box Style1-->
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="single-service-box-style1">
                                                <div class="icon">
                                                    <span class="icon-loan"></span>
                                                </div>
                                                <h3><a href="#">Asset Finanance Loans</a></h3>
                                                <div class="border-box"></div>
                                                <p>A form of asset-based finance that uses assets on your balance sheet as security against lending.</p>
                                                <h6><span>*</span> Check today’s Interest Rates</h6>
                                                <div class="btn-box">
                                                    <a href="{{ route('view-asset-loans') }}"><span class="icon-right-arrow"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Service Box Style1-->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--End Tabs Content Box-->

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="service-style1__btns-box text-center">
                        <a class="btn-one" href="{{ route('services') }}">
                            <span class="txt">View All Services</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Service Style1 Area-->

    <!--Start Wealth Secure Area-->
    
    <!--End Wealth Secure Area-->

    <!--Start Features Style2 Area-->
    <section class="features-style2-area">
        <div class="container">
            <div class="sec-title text-center">
                <h2>Why choose Bridge Trust Finance</h2>
                <div class="sub-title">
                    <p>List of Financing service requests all in one place.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="features-style2-content">

                        <!--Start Features Style2 Tab-->
                        <div class="features-style2-tab">
                            <!--Start Features Style2 Tab Button-->
                            <div class="features-style2-tab__button">
                                <ul class="owl-carousel owl-theme thm-owl__carousel features-style2-carousel owl-nav-style-one tabs-button-box" data-owl-options='{
                                    "loop": false,
                                    "autoplay": false,
                                    "margin": 0,
                                    "nav": true,
                                    "dots": false,
                                    "smartSpeed": 500,
                                    "autoplayTimeout": 10000,
                                    "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                    "responsive": {
                                            "0": {
                                                "items": 1
                                            },
                                            "768": {
                                                "items": 2
                                            },
                                            "992": {
                                                "items": 3
                                            },
                                            "1200": {
                                                "items": 4
                                            }
                                        }
                                    }'>

                                    <li data-tab="#tabid11" class="tab-btn-item active-btn-item clearfix">
                                        <div class="single-features-box-style2">
                                            <div class="icon">
                                                <span class="icon-credit-card"></span>
                                            </div>
                                            <div class="title">
                                                <h3><a href="#">Better Flexible<br> Loans</a></h3>
                                            </div>
                                            <div class="arrow-button">
                                                <a href="#">
                                                    <span class="icon-chevron"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li data-tab="#tabid22" class="tab-btn-item clearfix">
                                        <div class="single-features-box-style2">
                                            <div class="icon">
                                                <span class="icon-computer"></span>
                                            </div>
                                            <div class="title">
                                                <h3><a href="#">Mobile / Internet<br> Financing</a></h3>
                                            </div>
                                            <div class="arrow-button">
                                                <a href="#">
                                                    <span class="icon-chevron"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li data-tab="#tabid33" class="tab-btn-item clearfix">
                                        <div class="single-features-box-style2">
                                            <div class="icon">
                                                <span class="icon-book"></span>
                                            </div>
                                            <div class="title">
                                                <h3><a href="#">Get Funds<br> in No-time</a></h3>
                                            </div>
                                            <div class="arrow-button">
                                                <a href="#">
                                                    <span class="icon-chevron"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li data-tab="#tabid44" class="tab-btn-item clearfix">
                                        <div class="single-features-box-style2">
                                            <div class="icon">
                                                <span class="icon-check-book"></span>
                                            </div>
                                            <div class="title">
                                                <h3><a href="#">End-to-End Online<br> Support</a></h3>
                                            </div>
                                            <div class="arrow-button">
                                                <a href="#">
                                                    <span class="icon-chevron"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- <li data-tab="#tabid55" class="tab-btn-item clearfix">
                                        <div class="single-features-box-style2">
                                            <div class="icon">
                                                <span class="icon-credit-card"></span>
                                            </div>
                                            <div class="title">
                                                <h3><a href="#">Credit / Debit Card<br> Related</a></h3>
                                            </div>
                                            <div class="arrow-button">
                                                <a href="#">
                                                    <span class="icon-chevron"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li data-tab="#tabid66" class="tab-btn-item clearfix">
                                        <div class="single-features-box-style2">
                                            <div class="icon">
                                                <span class="icon-computer"></span>
                                            </div>
                                            <div class="title">
                                                <h3><a href="#">Mobile / Internet<br> Financing</a></h3>
                                            </div>
                                            <div class="arrow-button">
                                                <a href="#">
                                                    <span class="icon-chevron"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li> -->

                                </ul>
                            </div>
                            <!--End Features Style2 Tab Button-->

                            <!--Start Tabs Content Box-->
                            <div class="tabs-content-box">
                                <!--Tab-->
                                <div class="tab-content-box-item tab-content-box-item-active" id="tabid11">
                                    <div class="features-style2-tab-content-box-item">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="features-style2-text-box">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                Pay for school the smart way. 
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Get the low rate you deserve.
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Flexible Repayment Options
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                View your offers in minutes
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="features-style2-banner-box">
                                                    <div class="text-box">
                                                        <div class="owl-carousel owl-theme thm-owl__carousel features-style2-banner-carousel owl-dot-style2" data-owl-options='{
                                                            "loop": true,
                                                            "autoplay": false,
                                                            "margin": 0,
                                                            "nav": false,
                                                            "dots": true,
                                                            "smartSpeed": 500,
                                                            "autoplayTimeout": 10000,
                                                            "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                                            "responsive": {
                                                                    "0": {
                                                                        "items": 1
                                                                    },
                                                                    "768": {
                                                                        "items": 1
                                                                    },
                                                                    "992": {
                                                                        "items": 1
                                                                    },
                                                                    "1200": {
                                                                        "items": 1
                                                                    }
                                                                }
                                                            }'>

                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Educational Loans</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Personal Loans</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Asset Financing Loans</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->

                                                        </div>
                                                    </div>
                                                    <div class="img-box">
                                                        <div class="img-box-bg" style="background-image: url('{{ asset("public/box/images/resources/features-style2-banner-1.jpg") }}');">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab-content-box-item" id="tabid22">
                                    <div class="features-style2-tab-content-box-item">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="features-style2-text-box">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                Unlock the Power of Your Mobile Device with<br>
                                                                Mobile Financing!
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Unlock the Possibilities with Mobile Financing
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Quick and Hassle-free Digital Journey
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Enjoy pocket-friendly interest rates
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="features-style2-banner-box">
                                                    <div class="text-box">
                                                        <div class="owl-carousel owl-theme thm-owl__carousel features-style2-banner-carousel owl-dot-style2" data-owl-options='{
                                                            "loop": true,
                                                            "autoplay": false,
                                                            "margin": 0,
                                                            "nav": false,
                                                            "dots": true,
                                                            "smartSpeed": 500,
                                                            "autoplayTimeout": 10000,
                                                            "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                                            "responsive": {
                                                                    "0": {
                                                                        "items": 1
                                                                    },
                                                                    "768": {
                                                                        "items": 1
                                                                    },
                                                                    "992": {
                                                                        "items": 1
                                                                    },
                                                                    "1200": {
                                                                        "items": 1
                                                                    }
                                                                }
                                                            }'>

                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Mobile / Internet Loans</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Home Improvement Loans</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <!-- <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Private Financing</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div> -->
                                                            <!--End Single Item-->

                                                        </div>
                                                    </div>
                                                    <div class="img-box">
                                                        <div class="img-box-bg" style="background-image: url('{{ asset("public/box/images/resources/features-style2-banner-2.jpg") }}');">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab-content-box-item" id="tabid33">
                                    <div class="features-style2-tab-content-box-item">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="features-style2-text-box">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                Gain easier access to your account.
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                No need for a lot of faxing and No-go-chases with<br>
                                                                fast loans
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Easily apply in two easy steps
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Completely digital paperless online personal loan<br>
                                                                application process
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="features-style2-banner-box">
                                                    <div class="text-box">
                                                        <div class="owl-carousel owl-theme thm-owl__carousel features-style2-banner-carousel owl-dot-style2" data-owl-options='{
                                                            "loop": true,
                                                            "autoplay": false,
                                                            "margin": 0,
                                                            "nav": false,
                                                            "dots": true,
                                                            "smartSpeed": 500,
                                                            "autoplayTimeout": 10000,
                                                            "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                                            "responsive": {
                                                                    "0": {
                                                                        "items": 1
                                                                    },
                                                                    "768": {
                                                                        "items": 1
                                                                    },
                                                                    "992": {
                                                                        "items": 1
                                                                    },
                                                                    "1200": {
                                                                        "items": 1
                                                                    }
                                                                }
                                                            }'>

                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>SME Loans</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Women in Business Soft Loans (Femiprise)</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Asset Finance loans</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->

                                                        </div>
                                                    </div>
                                                    <div class="img-box">
                                                        <div class="img-box-bg" style="background-image: url('{{ asset("public/box/images/resources/features-style2-banner-3.jpg") }}');">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab-content-box-item" id="tabid44">
                                    <div class="features-style2-tab-content-box-item">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="features-style2-text-box">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                We provide ongoing support with free credit monitoring <br>
                                                                – from start to finish
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                We offer a variety of support options, including chat, <br>
                                                                support tickets, and tech support
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="features-style2-banner-box">
                                                    <div class="text-box">
                                                        <div class="owl-carousel owl-theme thm-owl__carousel features-style2-banner-carousel owl-dot-style2" data-owl-options='{
                                                            "loop": true,
                                                            "autoplay": false,
                                                            "margin": 0,
                                                            "nav": false,
                                                            "dots": true,
                                                            "smartSpeed": 500,
                                                            "autoplayTimeout": 10000,
                                                            "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                                            "responsive": {
                                                                    "0": {
                                                                        "items": 1
                                                                    },
                                                                    "768": {
                                                                        "items": 1
                                                                    },
                                                                    "992": {
                                                                        "items": 1
                                                                    },
                                                                    "1200": {
                                                                        "items": 1
                                                                    }
                                                                }
                                                            }'>

                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Help-desk Support</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Requests & Enquiries</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Compliments & Complaints</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->

                                                        </div>
                                                    </div>
                                                    <div class="img-box">
                                                        <div class="img-box-bg" style="background-image: url('{{ asset("public/box/images/resources/features-style2-banner-4.jpg") }}');">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab-content-box-item" id="tabid55">
                                    <div class="features-style2-tab-content-box-item">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="features-style2-text-box">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                Cheque Book / DD Related
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Reissue Lost Debit / ATM Card
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Unlock Debit / ATM Card
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Generate Debit Card Pin Number
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="features-style2-banner-box">
                                                    <div class="text-box">
                                                        <div class="owl-carousel owl-theme thm-owl__carousel features-style2-banner-carousel owl-dot-style2" data-owl-options='{
                                                            "loop": true,
                                                            "autoplay": false,
                                                            "margin": 0,
                                                            "nav": false,
                                                            "dots": true,
                                                            "smartSpeed": 500,
                                                            "autoplayTimeout": 10000,
                                                            "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                                            "responsive": {
                                                                    "0": {
                                                                        "items": 1
                                                                    },
                                                                    "768": {
                                                                        "items": 1
                                                                    },
                                                                    "992": {
                                                                        "items": 1
                                                                    },
                                                                    "1200": {
                                                                        "items": 1
                                                                    }
                                                                }
                                                            }'>

                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Private Financing</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Private Financing</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Private Financing</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->

                                                        </div>
                                                    </div>
                                                    <div class="img-box">
                                                        <div class="img-box-bg" style="background-image: url('{{ asset("public/box/images/resources/features-style2-banner-1.jpg") }}');">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab-content-box-item" id="tabid66">
                                    <div class="features-style2-tab-content-box-item">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="features-style2-text-box">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                Cheque Book / DD Related
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Reissue Lost Debit / ATM Card
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Unlock Debit / ATM Card
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Generate Debit Card Pin Number
                                                                <span class="icon-right-arrow"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="features-style2-banner-box">
                                                    <div class="text-box">
                                                        <div class="owl-carousel owl-theme thm-owl__carousel features-style2-banner-carousel owl-dot-style2" data-owl-options='{
                                                            "loop": true,
                                                            "autoplay": false,
                                                            "margin": 0,
                                                            "nav": false,
                                                            "dots": true,
                                                            "smartSpeed": 500,
                                                            "autoplayTimeout": 10000,
                                                            "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                                            "responsive": {
                                                                    "0": {
                                                                        "items": 1
                                                                    },
                                                                    "768": {
                                                                        "items": 1
                                                                    },
                                                                    "992": {
                                                                        "items": 1
                                                                    },
                                                                    "1200": {
                                                                        "items": 1
                                                                    }
                                                                }
                                                            }'>

                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Private Financing</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Private Financing</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->
                                                            <!--Start Single Item-->
                                                            <div class="single-item">
                                                                <span class="icon-headphones"></span>
                                                                <h4>Call for</h4>
                                                                <h3>Private Financing</h3>
                                                                <h2>
                                                                    <a href="tel:2512353256">(+260) 767 759 619</a>
                                                                </h2>
                                                            </div>
                                                            <!--End Single Item-->

                                                        </div>
                                                    </div>
                                                    <div class="img-box">
                                                        <div class="img-box-bg" style="background-image: url('{{ asset("public/box/images/resources/features-style2-banner-1.jpg") }}');">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--End Tabs Content Box-->
                        </div>
                        <!--End Features Style2 Tab-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Features Style2 Area-->

    <!--Start Features Style3 Area-->
    <section class="features-style3-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="features-style3-img-box">
                        <div class="inner-img">
                            <img class="paroller" src="{{ asset('public/box/images/mobile.png') }}" alt="">
                        </div>
                        {{-- <div class="icon-holder float-bob-y">
                            <span class="icon-interest-rate"></span>
                        </div>
                        <div class="icon-holder two">
                            <span class="icon-online-shop"></span>
                        </div>
                        <div class="icon-holder three">
                            <span class="icon-theater"></span>
                        </div> --}}
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="features-style3-content">
                        <div class="sec-title">
                            <h2>Download Our Mobile App</h2>
                            <div class="sub-title">
                                <p>With our app, you can easily access your account
                                    information, apply for loans, and manage your
                                    payments on the go, making it easier than ever to
                                    stay on top of your finances.</p>
                            </div>
                        </div>
                        <div class="get-app-box">
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="icon">
                                            <span class="icon-play-store"></span>
                                        </div>
                                        <div class="text">
                                            <h4>Download</h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="style2" href="#">
                                        <div class="icon">
                                            <span class="icon-apple"></span>
                                        </div>
                                        <div class="text">
                                            <h4>Download</h4>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Features Style3 Area-->

    <!--Start Money Exchange Rates Area-->
    
    <!--End Money Exchange Rates Area-->


    <!--Start Faq Style1 Area-->
    <section class="faq-style1-area">
        <div class="container">

            <div class="row">
                <div class="col-xl-12">
                    <div class="faq-style1-title">
                        <div class="sec-title">
                            <h2>Questions & Answers</h2>
                            <div class="sub-title">
                                <p>Find answers to all your queries about our service.</p>
                            </div>
                        </div>
                        <div class="faq-search-box">
                            {{-- <h3>Help You to Find</h3>
                            <div class="faq-search-box__inner">
                                <form class="search-form" action="#">
                                    <input placeholder="Related Keyword..." type="text">
                                    <button type="submit">
                                        <i class="icon-search"></i>
                                    </button>
                                </form>
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-6">
                    <div class="faq-style1__image">
                        <div class="inner">
                            <img src="{{ asset('public/box/images/resources/faq-style1__image.jpg') }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="faq-style1__content">
                        <ul class="accordion-box">

                            <li class="accordion block active-block">
                                <div class="acc-btn active">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h3>How do I qualify for a Small Business Loan?</h3>
                                </div>
                                <div class="acc-content current">
                                    <p>To qualify for a small business loan, you’ll need to meet the approval requirements of the lender. These vary, but they typically include factors such as your credit score, revenue and time in business. Many lenders list their minimum requirements online — though meeting them doesn’t guarantee you’ll qualify for the loan. 
                                        Research your financing options to see which might be the best fit.</p>
                                </div>
                            </li>
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h3>What are your working hours?</h3>
                                </div>
                                <div class="acc-content">
                                    <p>
                                        Our branches are open Monday-Friday 08:00-17:00 and Saturday 08:00-12:00.
                                        Our call centre hours are Monday-Friday 08:00-18:00 and Saturday 08:00-12:00.
                                    </p>
                                </div>
                            </li>
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h3>I do not have one of the required documents. Can you make an exception?</h3>
                                </div>
                                <div class="acc-content">
                                    <p>
                                        Unfortunately, we can't make an exception, and you need to submit all the required documents to apply.
                                    </p>
                                </div>
                            </li>
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h3>How long does it take to process the loan application?</h3>
                                </div>
                                <div class="acc-content">
                                    <p>If you have all the documents in place, 
                                        we will have your application approved the same day.</p>
                                </div>
                            </li>
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h3>What identity documents do I need to apply for a loan?</h3>
                                </div>
                                <div class="acc-content">
                                    <p>National Registration Card, passport, driver's license (not expired) qualify as valid identity documents. 
                                        For non-citizens, an ID document or passport (not expired) and a work permit are required.</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="faq-style1-bottom-box text-center">
                        <p>Didn’t get, Click below button to more anwers or <a href="{{ route('contact') }}">contact us.</a></p>
                        <div class="btns-box">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn-one" href="#staticBackdrop">
                                <span class="txt">Grab Your Loan</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Faq Style1 Area-->

    <!--Start Deals Area-->
    <section class="deals-area">
        <div class="auto-container">
            <div class="deals-content-box">
                <div class="owl-carousel owl-theme thm-owl__carousel deals-carousel-one owl-nav-style-one" data-owl-options='{
                    "loop": true,
                    "autoplay": true,
                    "margin": 50,
                    "nav": true,
                    "dots": false,
                    "smartSpeed": 500,
                    "autoplayTimeout": 10000,
                    "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                    "responsive": {
                            "0": {
                                "items": 1
                            },
                            "768": {
                                "items": 1
                            },
                            "992": {
                                "items": 1
                            },
                            "1550": {
                                "items": 1.4
                            }
                        }
                    }'>


                    <!--Start Single Deals Box-->
                    <div class="single-deals-box">
                        <div class="text-box">
                            <div class="inner-title">
                                <h4>Make a loan, change your life.</h4>
                                <h2>Invest in change that lasts</h2>
                            </div>
                            {{-- <p>Claims off duty or the obligations business it will frequently occur
                                that pleasures be repudiated.</p> --}}
                            {{-- <ul>
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-checkbox-mark"></span>
                                        </div>
                                        <div class="text">
                                            <p>Spend<br> Minimum 75 US Dollar</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-checkbox-mark"></span>
                                        </div>
                                        <div class="text">
                                            <p>Spend<br> Minimum 50 US Dollar</p>
                                        </div>
                                    </div>
                                </li>
                            </ul> --}}
                            <div class="btns-box">
                                {{-- <a class="btn-one" href="">
                                    <span class="txt">Grab Your Deals</span>
                                </a> --}}
                            </div>
                        </div>
                        <div class="img-box">
                            <div class="img-bg" style="background-image: url('{{ asset("public/box/images/fam.jpg") }}');">
                            </div>
                            <div class="shape-left-1"></div>
                            <div class="shape-right-1"></div>
                            <div class="shape-right-2"></div>
                        </div>
                    </div>
                    <!--End Single Deals public/box-->
                    <!--Start Single Deals public/box-->
                    <div class="single-deals-box">
                        <div class="text-box">
                            <div class="inner-title">
                                <h4>Achieve your career goals</h4>
                                <h2>Your dream university can be your reality</h2>
                            </div>
                            {{-- <p>Claims off duty or the obligations business it will frequently occur
                                that pleasures be repudiated.</p> --}}
                            {{-- <ul>
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-checkbox-mark"></span>
                                        </div>
                                        <div class="text">
                                            <p>Spend<br> Minimum 40 US Dollar</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-checkbox-mark"></span>
                                        </div>
                                        <div class="text">
                                            <p>Not Valid for<br> Commercial Credit Card</p>
                                        </div>
                                    </div>
                                </li>
                            </ul> --}}
                            <div class="btns-box">
                                {{-- <a class="btn-one" href="#">
                                    <span class="txt">Grab Your Deals</span>
                                </a> --}}
                            </div>
                        </div>
                        <div class="img-box">
                            <div class="img-bg" style="background-image: url('{{ asset("public/box/images/graduate.jpg") }}');">
                            </div>
                            <div class="shape-left-1"></div>
                            <div class="shape-right-1"></div>
                            <div class="shape-right-2"></div>
                        </div>
                    </div>
                    <!--End Single Deals Box-->

                    <!--Start Single Deals Box-->
                    <div class="single-deals-box">
                        <div class="text-box">
                            <div class="inner-title">
                                <h4>Repayment - Upto 3 month</h4>
                                <h2>Make the car you want yours — on your terms.</h2>
                            </div>
                            {{-- <p>With access to special rates our team can get you behind the wheel faster and cheaper!</p> --}}
                            {{-- <ul>
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-checkbox-mark"></span>
                                        </div>
                                        <div class="text">
                                            <p>Spend<br> Minimum 75 US Dollar</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-checkbox-mark"></span>
                                        </div>
                                        <div class="text">
                                            <p>Spend<br> Minimum 50 US Dollar</p>
                                        </div>
                                    </div>
                                </li>
                            </ul> --}}
                            <div class="btns-box">
                                {{-- <a class="btn-one" href="#">
                                    <span class="txt">Grab Your Deals</span>
                                </a> --}}
                            </div>
                        </div>
                        <div class="img-box">
                            <div class="img-bg" style="background-image: url('{{ asset('public/box/images/v-loan.jpg') }}');">
                            </div>
                            <div class="shape-left-1"></div>
                            <div class="shape-right-1"></div>
                            <div class="shape-right-2"></div>
                        </div>
                    </div>
                    <!--End Single Deals Box-->
                    <!--Start Single Deals Box-->
                    {{-- <div class="single-deals-box">
                        <div class="text-box">
                            <div class="inner-title">
                                <h4>Get 10% Cashback</h4>
                                <h2>Buy a Mobile Phone</h2>
                            </div>
                            <p>
                                Bridge Trust FInance makes Personal Loan and Asset Finance application easy.
                            </p>
                            <ul>
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-checkbox-mark"></span>
                                        </div>
                                        <div class="text">
                                            <p>Spend<br> Minimum 40 US Dollar</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-checkbox-mark"></span>
                                        </div>
                                        <div class="text">
                                            <p>Not Valid for<br> Commercial Credit Card</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="btns-box">
                                <a class="btn-one" href="#">
                                    <span class="txt">Grab Your Deals</span>
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <div class="img-bg" style="background-image: url('{{ asset("box/images/resources/deals-2.jpg") }}');">
                            </div>
                            <div class="shape-left-1"></div>
                            <div class="shape-right-1"></div>
                            <div class="shape-right-2"></div>
                        </div>
                    </div> --}}
                    <!--End Single Deals Box-->
                </div>
            </div>
        </div>
    </section>
    <!--End Deals Area-->

    


    <!--Start slogan area-->
    <section class="slogan-area">
        <div class="container">
            <div class="slogan-content-box">
                <div class="slogan-content-box-bg" style="background-image: url('{{ asset("public/box/images/mobile.jpg") }}');"></div>
                <div class="inner-title">
                    <h2>Experience a New Digital World.</h2>
                    <p>Mobile Financing application with new & exciting features.</p>
                </div>
                <div class="get-app-box">
                    <ul>
                        <li>
                            <a href="#">
                                <div class="icon">
                                    <span class="icon-play-store"></span>
                                </div>
                                <div class="text">
                                    <h4>Download</h4>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="style2" href="#">
                                <div class="icon">
                                    <span class="icon-apple"></span>
                                </div>
                                <div class="text">
                                    <h4>Download</h4>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End slogan area-->
