<div>
{{-- <x-app-layout> --}}
    <section class="breadcrumb-area">
        <div class="breadcrumb-area-bg"
            style="background-image: url('{{ asset('public/box/images/asset-finance-bg.jpg') }}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                            <h2>Asset Finance Loan</h2>
                        </div>
                        <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                            data-aos-duration="500">
                            <ul>
                                <li><a href="{{ route('welcome') }}">Home</a></li>
                                <li class="active">Asset Finance Loan</li>
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
                <h4>What is Asset Finance Loan</h4>
                <div class="sub-title">
                    <p>Asset finance loans are a type of financing that allows businesses to acquire assets, such as equipment or vehicles, by borrowing money from a lender. The assets themselves serve as collateral for the loan, which means that if the borrower is unable to repay the loan, the lender can seize the assets to recover their money.</p>
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
                            style="background-image: url('{{ asset("public/box/images/resources/apply-form-box-bg.jpg") }}');"></div>
                        <div class="apply-form-box__content">
                            <div class="sec-title">
                                <h2>Unlock the value of your assets. Submit your loan request today and get the funds you need!</h2>
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
                <!-- <div style="padding-left:20px;"class="items-center owl-carousel owl-theme thm-owl__carousel partner-carousel" 
                    data-owl-options='{
                        "loop": false,
                        "autoplay": true,
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
                        <div class="col-lg-12 row">
                            <div style="margin-left:20px" class="single-partner-logo-box">
                                <a href="#"><img src="{{ asset('public/box/partners/cbu2.jpeg') }}" alt="Awesome Image"></a>
                            </div>
                            <div class="single-partner-logo-box">
                                <a href="#"><img src="{{ asset('public/box/partners/mulu.jpeg') }}" alt="Awesome Image"></a>
                            </div>
                            <div class="single-partner-logo-box">
                                <a href="#"><img src="{{ asset('public/box/partners/muku.png') }}" alt="Awesome Image"></a>
                            </div>
                        </div>
                </div> -->
                <div style="display: flex;
                justify-content: center;
                align-items: center;">
                    <span>
                        <a href="#"><img width="90" src="{{ asset('public/box/partners/cbu2.jpeg') }}" alt="Awesome Image"></a>
                    </span>
                    &nbsp;
                    <span>
                        <a href="#"><img width="90" height="10px" src="{{ asset('public/box/partners/mulu.jpeg') }}" alt="Awesome Image"></a>
                    </span>
                    &nbsp;
                    <span>
                        <a href="#"><img width="90" src="{{ asset('public/box/partners/muku.png') }}" alt="Awesome Image"></a>
                    </span>
                </div>
            </div>
        </div>
    </section>
{{-- </x-app-layout> --}}

</div>