<!-- Modal -->
<div wire:ignore.self class="modal fade {{ $class}}" style="{{ $style }}" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div id="closere" class="preloader-close" data-bs-dismiss="modal" aria-label="Close">x</div>
                <main class="d-flex align-items-center">
                    <div class="container">
                        {{-- <form onsubmit="event.preventDefault(); submit_request();" id="wizard" enctype="multipart/form-data"> --}}
                        <form action="{{ route("loan-request") }}" method="POST" id="wizard" enctype="multipart/form-data">
                            @csrf
                            <h3>Step 1 Title</h3>
                            <section>
                                <div class="sec-title">
                                    <h2>{{ $step_1_title }}</h2>
                                    <div class="sub-title">
                                        <p>Fill in all the necessary details to started with the first step.</p>
                                    </div>
                                </div>
                                <div class="apply-form-box__content">


                                    <div id="apply-form" name="apply_form" class="default-form2" action="https://st.ourhtmldemo.com/new/finbank-demo/index.php" method="post">

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="fname" id="fname" placeholder="First Name" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="lname" id="lname" placeholder="Last Name" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" required="required" name="amount" placeholder="Amount" id="amount">
                                                        <div class="icon">
                                                            <i class="fas fa-money-bill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="type" class="wide">
                                                            <option data-display="Purpose of Loan">
                                                                Purpose of Loan
                                                            </option>
                                                            <option value="Personal">Personal</option>
                                                            <option value="Education">Education</option>
                                                            <option value="Asset Financing">Asset Financing</option>
                                                            <option value="Home Improvement">Home Improvements</option>
                                                            <option value="SME Based">SME Based</option>
                                                            <option value="Women in Business (Femiprise) Soft">Women in Business</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="gender" class="wide">
                                                            <option data-display="Your Gender">
                                                                Gender
                                                            </option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="repayment_plan" class="wide">
                                                            <option data-display="Proposed repayment plan">
                                                                Proposed repayment plan
                                                            </option>
                                                            <option value="1 Week">After 1 Week</option>
                                                            <option value="1 Month">After 1 Month</option>
                                                            <option value="3 Month">After 3 Months</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="phone" value="" id="formPhone" placeholder="Phone">
                                                        <div class="icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="email" name="email" id="formEmail" placeholder="Email" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-envelope-open"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <h3>Step 2 Title</h3>
                            <section>
                                <div class="sec-title">
                                    <h2>Guarantor & Loan Credentials</h2>
                                    <div class="sub-title">
                                        <p>Fill in all the necessary details to started with continue second step.</p>
                                    </div>
                                </div>
                                <div class="apply-form-box__content">


                                    <div id="apply-form" name="apply_form" class="default-form2">
                                        <div class="sec-title">
                                            <h5>Guarantor 1</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="gfname" id="gfname" placeholder="Guarantor 1's First Name" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="glname" id="glname" placeholder="Guarantor 1's  Last Name" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="g_relation" class="wide">
                                                            <option data-display=" Relation">
                                                                Relation
                                                            </option>
                                                            <option value="Relative">Relative</option>
                                                            <option value="Work Mate">Work Mate</option>
                                                            <option value="Close Friend">Close Friend</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="g_gender" class="wide">
                                                            <option data-display="Gender">
                                                                Gender
                                                            </option>
                                                            <option value="Female">Female</option>
                                                            <option value="Male">Male</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="gphone" value="" id="formPhone" placeholder="Guarantor 1's Phone">
                                                        <div class="icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="email" name="gemail" id="formEmail" placeholder="Guarantor 1's Email" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-envelope-open"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="sec-title">
                                            <h5>Guarantor 2</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="g2fname" id="g2fname" placeholder="Guarantor 2's First Name" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="g2lname" id="g2lname" placeholder="Guarantor 2's  Last Name" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="g2_relation" class="wide">
                                                            <option data-display="Relation">
                                                                Relation
                                                            </option>
                                                            <option value="Relative">Relative</option>
                                                            <option value="Work Mate">Work Mate</option>
                                                            <option value="Close Friend">Close Friend</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="g2_gender" class="wide">
                                                            <option data-display="Gender">
                                                                Gender
                                                            </option>
                                                            <option value="Female">Female</option>
                                                            <option value="Male">Male</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="g2phone" id="formPhone" placeholder="Guarantor 2's Phone">
                                                        <div class="icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="email" name="g2email" id="formEmail" placeholder="Guarantor 2's Email" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-envelope-open"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>Step 3 Title</h3>
                            <section>
                                <div class="sec-title">
                                    <h2>Documents</h2>
                                    <div class="sub-title">
                                        <p>Fill in all the necessary details to started with the first step.</p>
                                    </div>
                                </div>
                                <div class="apply-form-box__content">


                                    <div id="apply-form">
                                        {{-- <div class="sec-title">
                                            <h5>Ba</h5>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">National ID (NRC)</label>
                                                            <input name="nrc_file" class="form-control" type="file" id="formFile" />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Payslip (leave empty if not applicable)</label>
                                                            <input name="payslip_file" class="form-control" type="file"  />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- <div class="sec-title">
                                            <h5>NRC</h5>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">TPIN</label>
                                                            <input name="tpin_file" class="form-control" type="file"  />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <div class="mb-3">
                                                            <label for="formFile" name="" class="form-label">Potrait Picture of you holding NRC</label>
                                                            <input class="form-control" type="file" id="formFile">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>
                                    <button type="submit" class="btn-one">Submit</button>
                                </div>
                                <div wire:loading wire:target="submit">
                                    Loading...
                                 </div> 
                            </section>
                        </form>
                    </div>
                </main>

            </div>

        </div>
    </div>
</div>

<style>
    .modal-dialog {
        max-width: 100%;
        margin: 0;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        display: flex;
        position: fixed;
    }

    .apply-form-box__content {
        position: relative;
        display: block;
        max-width: 100%;
        width: 100%;
        /* float: left; */
        background-color: #f7f1eb;
        padding: 50px;
    }

    #closere {
        position: absolute;
        top: 9px;
        right: 15px;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        font-size: 20px;
        line-height: 36px;
        background: #e3d3d3;
        text-align: center;
        cursor: pointer;
        z-index: 99999999;
        color: #7b1919;
    }
    
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //remove default #finish button
        $('#wizard').find('a[href="#finish"]').remove(); 
        // alert(currentIndex);
        setTimeout(() => {
            // $('#wizard .actions li:last-child').$(selected).attr('" your attribute "', '" value you want to set "');
            // $('#wizard .actions li:last-child').append('<a href="#" style="display:block" wire:click="submit" role="menuitem">Send</a>');
        }, 3000);
        //append a submit type button 

    }); 
        function submit_request(){
            var data = $('form').serialize();
            console.log(data);
            
            $.ajax({
                type:'POST',
                url:'{{ route("loan-request") }}',
                data:data,
                success:function(data) {    
                    console.log(data);
                },
                
                error: function (msg) {
                    console.log(msg);
                    var errors = msg.responseJSON;
                }
            }); 
        }      
</script>