{{-- <x-app-layout> --}}
    <section class="breadcrumb-area">
        <div class="breadcrumb-area-bg"
            style="background-image: url('{{asset("public/box/images/v-loan.jpg")}}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                            <h2>Vehicle Loan</h2>
                        </div>
                        <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                            data-aos-duration="500">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Vehicle Loan</li>
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
                <h4>What is a Vehicle Loan?</h4>
                <div class="sub-title">
                    <p>
                        With easy online application, competitive interest rates, and flexible repayment terms, our loans are designed to help you get the car you want without breaking the bank. Whether you're looking for a new or used car, we can provide the funding you need to make it happen. And with fast approval and no hidden fees, you can shop with confidence. Don't let financing stand between you and the car of your dreams. Apply for a vehicle loan with us today and start driving towards your future.
                    </p>
                </div>
            </div>
            <div class="sec-title text-center">
                <h3>How to Apply</h3>
            </div>
            
            @include('livewire\loans\__parts\how-to-apply')
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
                            style="background-image: url('{{ asset('public/box/images/resources/apply-form-box-bg.jpg') }}');"></div>
                        <div class="apply-form-box__content">
                            <div class="sec-title">
                                <h2>Send Your Request &<br> Get Call Back</h2>
                                <div class="sub-title">
                                    <p>Fill all the necessary details and Get call from experts.</p>
                                </div>
                            </div>

                            <form id="apply-form" name="apply_form" class="default-form2" action="https://st.ourhtmldemo.com/new/finbank-demo/index.php"
                                method="post">

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <div class="input-box">
                                                <input type="text" name="form_name" id="formName"
                                                    placeholder="Your Name" required="">
                                                <div class="icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <div class="input-box">
                                                <input type="email" name="form_email" id="formEmail"
                                                    placeholder="Email" required="">
                                                <div class="icon">
                                                    <i class="fas fa-envelope-open"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <div class="input-box">
                                                <input type="text" name="form_phone" value="" id="formPhone"
                                                    placeholder="Phone">
                                                <div class="icon">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <div class="select-box clearfix">
                                                <select class="wide">
                                                    <option data-display="State">
                                                        State
                                                    </option>
                                                    <option value="1">Alaska</option>
                                                    <option value="2">Florida</option>
                                                    <option value="3">Georgia</option>
                                                    <option value="4">Indiana</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <div class="select-box clearfix">
                                                <select class="wide">
                                                    <option data-display="City">
                                                        City
                                                    </option>
                                                    <option value="1">Alaska</option>
                                                    <option value="2">Florida</option>
                                                    <option value="3">Georgia</option>
                                                    <option value="4">Indiana</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <div class="input-box">
                                                <input type="text" name="date" placeholder="Date" id="datepicker">
                                                <div class="icon">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="button-box">
                                            <button class="btn-one" type="submit">
                                                <span class="txt">
                                                    Send Request
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>

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
                    <div class="single-partner-logo-box">
                        <a href="#"><img src="{{ asset('public/box/images/brand/brand-1-1.png')}}" alt="Awesome Image"></a>
                    </div>
                    <!--End Single Partner Logo Box-->
                    <!--Start Single Partner Logo Box-->
                    <div class="single-partner-logo-box">
                        <a href="#"><img src="{{ asset('public/box/images/brand/brand-1-2.png') }}" alt="Awesome Image"></a>
                    </div>
                    <!--End Single Partner Logo Box-->
                    <!--Start Single Partner Logo Box-->
                    <div class="single-partner-logo-box">
                        <a href="#"><img src="{{ asset('public/box/images/brand/brand-1-3.png') }}" alt="Awesome Image"></a>
                    </div>
                    <!--End Single Partner Logo Box-->
                    <!--Start Single Partner Logo Box-->
                    <div class="single-partner-logo-box">
                        <a href="#"><img src="{{ asset('public/box/images/brand/brand-1-4.png') }}" alt="Awesome Image"></a>
                    </div>
                    <!--End Single Partner Logo Box-->
                    <!--Start Single Partner Logo Box-->
                    <div class="single-partner-logo-box">
                        <a href="#"><img src="{{ asset('public/box/images/brand/brand-1-5.png') }}" alt="Awesome Image"></a>
                    </div>
                    <!--End Single Partner Logo Box-->
                    <!--Start Single Partner Logo Box-->
                    <div class="single-partner-logo-box">
                        <a href="#"><img src="{{ asset('public/box/images/brand/brand-1-6.png') }}" alt="Awesome Image"></a>
                    </div>
                    <!--End Single Partner Logo Box-->
                </div>
            </div>
        </div>
    </section>
{{-- </x-app-layout> --}}
