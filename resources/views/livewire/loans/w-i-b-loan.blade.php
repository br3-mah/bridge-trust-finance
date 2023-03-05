<div>
{{-- <x-app-layout> --}}
    <section class="breadcrumb-area">
        <div class="breadcrumb-area-bg"
            style="background-image: url('{{asset("public/box/images/wib.jpg")}}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                            <h2>Women In Business (Femiprise) - Soft Loan</h2>
                        </div>
                        <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                            data-aos-duration="500">
                            <ul>
                                <li><a href="{{route('welcome')}}">Home</a></li>
                                <li class="active">Femiprise Loan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->



    <!--Start Applying Process Area-->
    <section class="applying-process-area">
        <div class="container">
            <div class="sec-title text-center">
                <h4>Women in Business (Fermiprise) Soft Loan?</h4>
                <div class="sub-title">
                    <p>
                        As a woman entrepreneur, you have the drive, determination, and vision to succeed. 
                        But sometimes you need a little extra support to make your dreams a reality. 
                        That's where our Women in Business (Fermiprise) Soft Loan comes in. With our competitive interest rates, flexible repayment terms, and fast online application process, we make it easy to get the funding you need to grow your business. Whether you're looking to invest in new equipment, hire staff, or expand your operations, our loans are designed to meet your unique needs. And with our commitment to empowering women in business, you can trust us to be your partner in success. 
                        Apply now and take the first step towards achieving your entrepreneurial vision.
                    </p>
                </div>
            </div>
            <div class="sec-title text-center">
                <h3>How to Apply</h3>
            </div>
            @include('livewire.loans.__parts.how-to-apply')
        </div>
    </section>
    <!--End Applying Process Area-->

    <!--Start Apply Form Area-->
    <section class="apply-form-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="apply-form-box clearfix">
                        <div class="apply-form-box-bg"
                            style="background-image: url('{{ asset("public/box/images/resources/apply-form-box-bg.jpg")}}');"></div>
                        <div class="apply-form-box__content">
                            <div class="sec-title">
                                <h2>Empowering women entrepreneurs to reach new heights. Submit your Women in Business loan request today and elevate your business with Fermiprise!</h2>
                                <div class="sub-title">
                                    <p>Fill all the necessary details and Get call from experts.</p>
                                </div>
                                <div>
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @include('livewire.loans.__parts.service-contact-form')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Apply Form Area-->



    <!--Start Partner Area-->
    <section class="partner-area">
        <div class="container">
            <div class="partner-area__sec-title">
                <h3>Corporate Partnership With</h3>
            </div>
            <div class="brand-content">
                <div class="owl-carousel owl-theme thm-owl__carousel partner-carousel" data-owl-options='{
                    "loop": false,
                    "autoplay": true,
                    "margin": 25,
                    "nav": false,
                    "dots": false,
                    "smartSpeed": 500,
                    "autoplayTimeout": 10000,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive": {
                            "0": {
                                "items": 1
                            },
                            "768": {
                                "items": 3
                            },
                            "992": {
                                "items": 4
                            },
                            "1200": {
                                "items": 6
                            }
                        }
                    }'>

                    <!--Start Single Partner Logo Box-->
                    <div style="margin-left:20px" class="single-partner-logo-box">
                        <a href="#"><img src="{{ asset('public/box/partners/cbu2.jpeg') }}" alt="Awesome Image"></a>
                    </div>
                    <div class="single-partner-logo-box">
                        <a href="#"><img src="{{ asset('public/box/partners/mulu.jpeg') }}" alt="Awesome Image"></a>
                    </div>
                    <div class="single-partner-logo-box">
                        <a href="#"><img src="{{ asset('public/box/partners/muku.png') }}" alt="Awesome Image"></a>
                    </div>
                    <!--End Single Partner Logo Box-->
                </div>
            </div>
        </div>
    </section>
{{-- </x-app-layout> --}}

</div>