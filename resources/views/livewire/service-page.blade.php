<section class="breadcrumb-area">
    <div class="breadcrumb-area-bg" style="background-image: url('{{ asset("public/box/images/services.jpg") }}');"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content">
                    <div class="title" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                        <h2>Our Services</h2>
                    </div>
                    <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                        data-aos-duration="500">
                        <ul>
                            <li><a href="{{ route('welcome') }}">Home</a></li>
                            <li class="active">Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<section class="service-style1-area">
    <div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="service-style1-title">
                    <div class="sec-title">
                        <h2 style="color:#000;">Financing For Your Needs</h2>
                        <div class="sub-title">
                            <p style="color:brown">The Institution that builds better relationships.</p>
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
                                            <div style="color:#000;" class="icon">
                                                <span class="icon-safebox"></span>
                                            </div>
                                            <h3><a style="color:#000;" href="#">Personal Loans</a></h3>
                                            <div class="border-box"></div>
                                            <p style="color:#000;">Good credit means a great rate. Got good credit? Get a low-interest, 
                                                fixed-rate personal loan</p>
                                            <h6><span>*</span> Interest rate up to 20% p.m</h6>
                                            <div class="btn-box">
                                                <a href="{{ route('view-personal-loans') }}"><span class="icon-right-arrow"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Single Service Box Style1-->
                                    <!--Start Single Service Box Style1-->
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="single-service-box-style1">
                                            <div style="color:#000;" class="icon">
                                                <span class="icon-loan"></span>
                                            </div>
                                            <h3><a style="color:#000;" href="#">Educational Loans</a></h3>
                                            <div class="border-box"></div>
                                            <p style="color:#000;">
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
                                            <div style="color:#000;" class="icon">
                                                <span class="icon-online"></span>
                                            </div>
                                            <h3><a style="color:#000;" href="#">Women in Business Loans</a></h3>
                                            <div class="border-box"></div>
                                            <p style="color:#000;">Bridge Trust Finance helps women entrepreneurs launch new 
                                                businesses and compete in the marketplace. 
                                                Connect with the training and funding 
                                                opportunities specifically for women.
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
                                            <div style="color:#000;" class="icon">
                                                <span class="icon-online"></span>
                                            </div>
                                            <h3><a style="color:#000;" href="#">Home Improvement Loans</a></h3>
                                            <div class="border-box"></div>
                                            <p style="color:#000;">Turn your dream of owning a home into reality with Mighty Trust Finance Home Loans. Whether you are 
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
                                            <div style="color:#000;" class="icon">
                                                <span class="icon-safebox"></span>
                                            </div>
                                            <h3><a style="color:#000;" href="#">Agri Business Loans</a></h3>
                                            <div class="border-box"></div>
                                            <p style="color:#000;">Small business loans provide financing to help business owners launch, run and grow their businesses.</p>
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
                                            <div style="color:#000;" class="icon">
                                                <span class="icon-loan"></span>
                                            </div>
                                            <h3><a style="color:#000;" href="#">Asset Finanance Loans</a></h3>
                                            <div class="border-box"></div>
                                            <p style="color:#000;">Collateral finance loans can help your business get the funds it needs by using an asset, such as equipment or real estate, as collateral. With this type of financing, you can borrow money against the value of the asset and then pay it back over time. Because the loan is secured by the asset, you may be able to get a lower interest rate than with other types of loans. 
                                                This can help you manage your cash flow more effectively and invest in your business growth..</p>
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

    </div>
</section>
