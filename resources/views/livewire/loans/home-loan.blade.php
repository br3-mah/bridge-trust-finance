<div>
{{-- <x-app-layout> --}}
    <section class="breadcrumb-area">
        <div class="breadcrumb-area-bg"
            style="background-image: url('{{asset("public/box/images/home-loan.jpg")}}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                            <h2>Home Improvement Loan</h2>
                        </div>
                        <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                            data-aos-duration="500">
                            <ul>
                                <li><a href="{{ route('welcome') }}">Home</a></li>
                                <li class="active">Home Improvement Loan</li>
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
                <h4>What is an Education Loan?</h4>
                <div class="sub-title">
                    <p>
                        A home improvement personal loan is an unsecured (no collateral) fixed-rate personal loan 
                        that is used for home renovations and repairs and repaid over a set length of time. 
                        Home improvement personal loans are a smart 
                        alternative to revolving high-interest credit cards and faster than tapping into home equity.
                        This mortgage loan can be used for outright purchases of residential properties, 
                        for equity release and for bridging finance to help you acquire a property while 
                        you are in the process of selling another.</p>

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
                                <h2>Transform your house into a dream home. Submit your home improvement loan request today and create the living space you deserve!</h2>
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