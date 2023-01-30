<!--Start breadcrumb area-->
<section class="breadcrumb-area">
    <div class="breadcrumb-area-bg"
        style="background-image: url('{{ asset('box/images/backgrounds/breadcrumb-area-bg-6.jpg') }}');"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content">
                    <div class="title" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                        <h2>Get In Touch</h2>
                    </div>
                    <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                        data-aos-duration="500">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Get In Touch</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->


<!--Start Main Contact Form Area-->
<section class="main-contact-form-area">
    <div class="container">
        <div class="row">

            <div class="col-xl-6">
                <div class="contact-info-box-style1">
                    <div class="box1"></div>
                    <div class="title">
                        <h2>Get Support for<br> any Queries or Complaints</h2>
                        <p>Committed to helping you meet all your Financing needs.</p>
                    </div>

                    <ul class="contact-info-1">
                        <li>
                            <div class="icon">
                                <span class="icon-map"></span>
                            </div>
                            <div class="text">
                                <p>Corporate Office</p>
                                <h3>Stand B19 CBU, Jambo Drive, Riverside, Kitwe.</h3>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="icon-clock"></span>
                            </div>
                            <div class="text">
                                <p>Office Hours</p>
                                <h3>Mon - Fri: 8.00am to 5.00pm</h3>
                                <span></span>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="icon-phone"></span>
                            </div>
                            <div class="text">
                                <p>Front Desk</p>
                                <h3><a href="tel:123456789">+260 976 7759 619</a></h3>
                                <h3><a href="mailto:yourmail@email.com">admin@bridgetrustfinance.co.zm</a></h3>
                            </div>
                        </li>
                    </ul>

                    <div class="bottom-box">
                        <div class="btn-box">
                            <a href="#"><i class="fas fa-arrow-down"></i> Customer Care</a>
                        </div>
                        <div class="footer-social-link-style1">
                            <ul class="clearfix">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-xl-6">
                <div class="contact-form">
                    <form id="contact-form" name="contact_form" class="default-form2"
                        action="https://st.ourhtmldemo.com/new/finbank-demo/assets/inc/sendmail.php" method="post">

                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-box">
                                <input type="text" name="form_name" id="formName" placeholder="xxxxxx"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="input-box">
                                <input type="email" name="form_email" id="formEmail" placeholder="" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ph. Num</label>
                            <div class="input-box">
                                <input type="text" name="form_phone" value="" id="formPhone" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Subject</label>
                            <div class="input-box">
                                <input type="text" name="form_subject" value="" id="formSubject"
                                    placeholder="Subject">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <div class="input-box">
                                <textarea name="form_message" id="formMessage" placeholder=""
                                    required=""></textarea>
                            </div>
                        </div>

                        <div class="button-box">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden"
                                value="">
                            <button class="btn-one" type="submit" data-loading-text="Please wait...">
                                <span class="txt">
                                    send a message
                                </span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!--End Main Contact Form Area-->

<!--Google Map Start-->
<section class="google-map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
        class="google-map__one" allowfullscreen></iframe>

    <div class="google-map-content-box">
        <div class="branch-atm-tab">
            <!--Start Branch Atm Tab Buttom-->
            {{-- <div class="branch-atm-tab__button">
                <ul class="tabs-button-box">
                    <li data-tab="#branch" class="tab-btn-item active-btn-item">
                        <h5>Branch</h5>
                    </li>
                    <li data-tab="#atm" class="tab-btn-item">
                        <h5>atm</h5>
                    </li>
                </ul>
                <div class="location-search-box">
                    <div class="location-search-box__inner">
                        <form class="search-form" action="#">
                            <div class="input-box">
                                <input placeholder="Enter Your Location" type="text">
                                <div class="icon">
                                    <span class="icon-map"></span>
                                </div>
                            </div>
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div> --}}
            <!--End Branch Atm Tab Buttom-->

            <!--Start Tabs Content Box-->
            <div class="tabs-content-box">
                <!--Tab-->
                <div class="tab-content-box-item tab-content-box-item-active" id="branch">
                    <div class="branch-atm-tab-content-box-item">
                        <div class="inner-title">
                            <h3>Bridge Trust Finance,<br> Kitwe</h3>
                        </div>
                        <ul>
                            {{-- <li>
                                <h3>ifsc</h3>
                                <p>finbif1234</p>
                            </li> --}}
                            <li>
                                <h3>Address</h3>
                                <p>Stand B19 CBU, Jambo Drive, <br>Riverside, Kitwe.</p>
                            </li>
                            <li>
                                <h3>Phone & Email</h3>
                                <p><a href="tel:+2609767759619">+2609767759619</a></p>
                                <p><a href="mailto:admin@bridgetrustfinance.co.zm">support@bridgetrustfinance.co.zm</a></p>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--Tab-->
                {{-- <div class="tab-content-box-item" id="atm">
                    <div class="branch-atm-tab-content-box-item">
                        <div class="inner-title">
                            <h3>Ndola, 23/8<br> West North Central</h3>
                        </div>
                        <ul>
                            <li>
                                <h3>Arizona</h3>
                                <p>finbif1234</p>
                            </li>
                            <li>
                                <h3>Address</h3>
                                <p>24/7, 1st Floor Global Str, 2nd Cross,<br> SF 94112.</p>
                            </li>
                            <li>
                                <h3>Phone & Email</h3>
                                <p><a href="tel:123456789">+415 67 890 12</a></p>
                                <p><a href="mailto:yourmail@email.com">support@finbank1234.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            <!--End Tabs Content Box-->

        </div>
    </div>

</section>
<!--Google Map End-->

<!--Start Customer Care Numbers Area-->
<section class="customer-care-numbers-area">
    <div class="container">
        <div class="title-box">
            <h2>Customer Care Numbers</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="customer-care-numbers-tab">

                    <div class="customer-care-numbers-tab__button">
                        <ul class="tabs-button-box clearfix">
                            <li data-tab="#personal-banking" class="tab-btn-item active-btn-item">
                                <h4>Personal Financing</h4>
                            </li>
                            <li data-tab="#corporate-banking" class="tab-btn-item">
                                <h4>Corporate Financing</h4>
                            </li>
                        </ul>
                    </div>

                    <!--Start Tabs Content Box-->
                    <div class="tabs-content-box">
                        <!--Tab-->
                        <div class="tab-content-box-item tab-content-box-item-active" id="personal-banking">

                            <div class="customer-care-numbers-tab-content-box-item">
                                <div class="customer-care-numbers-table-box">
                                    <div class="table-outer">
                                        <table class="customer-care-numbers-table">
                                            <thead class="header">
                                                <tr>
                                                    <th>Service</th>
                                                    <th>Contact Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="inner-title">
                                                        <h3>General Query/Complaint</h3>
                                                    </td>
                                                    <td class="contact-info">
                                                        <ul>
                                                            <li>
                                                                <a href="tel:2512353256">+844 123 4567 89</a>
                                                                <span>(Toll Free)</span>
                                                            </li>
                                                            <li>
                                                                <a class="color2"
                                                                    href="mailto:yourmail@email.com">customercare@bridgetrustfinance.co.zm</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="inner-title">
                                                        <h3>Credit Card</h3>
                                                    </td>
                                                    <td class="contact-info">
                                                        <ul>
                                                            <li>
                                                                <a href="tel:2512353256">+844 789 0123 45</a>
                                                            </li>
                                                            <li>
                                                                <a class="color2"
                                                                    href="mailto:yourmail@email.com">creditcard@bridgetrustfinance.co.zm</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="bottom-text text-center">
                                        {{-- <h3>To submit your complaint, <a href="#">Click here</a></h3> --}}
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--Tab-->
                        <div class="tab-content-box-item" id="corporate-banking">

                            <div class="customer-care-numbers-tab-content-box-item">
                                <div class="customer-care-numbers-table-box">
                                    <div class="table-outer">
                                        <table class="customer-care-numbers-table">
                                            <thead class="header">
                                                <tr>
                                                    <th>Service</th>
                                                    <th>Contact Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="inner-title">
                                                        <h3>General Query/Complaint</h3>
                                                    </td>
                                                    <td class="contact-info">
                                                        <ul>
                                                            <li>
                                                                <a href="tel:2512353256">+844 123 4567 89</a>
                                                                <span>(Toll Free)</span>
                                                            </li>
                                                            <li>
                                                                <a class="color2"
                                                                    href="mailto:yourmail@email.com">customercare@bridgetrustfinance.co.zm</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="inner-title">
                                                        <h3>Credit Card</h3>
                                                    </td>
                                                    <td class="contact-info">
                                                        <ul>
                                                            <li>
                                                                <a href="tel:2512353256">+844 789 0123 45</a>
                                                            </li>
                                                            <li>
                                                                <a class="color2"
                                                                    href="mailto:yourmail@email.com">creditcard@bridgetrustfinance.co.zm</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="bottom-text text-center">
                                        <h3>To submit your complaint, <a href="#">Click here</a></h3>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--End Customer Care Numbers Area-->