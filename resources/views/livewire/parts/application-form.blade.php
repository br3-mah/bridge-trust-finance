<!-- Modal -->
<div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div id="closere" class="preloader-close" data-bs-dismiss="modal" aria-label="Close">x</div>
                <main class="d-flex align-items-center">
                    <div class="container">
                        <div id="wizard">
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
                                                        <input type="text" wire:model.prevent="fname" id="fname" placeholder="First Name" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" wire:model.prevent="lname" id="lname" placeholder="Last Name" required="">
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
                                                        <input type="text" required="required" wire:model.prevent="amount" placeholder="Amount" id="amount">
                                                        <div class="icon">
                                                            <i class="fas fa-money-bill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select wire:model.prevent="type" class="wide">
                                                            <option data-display="Purpose of Loan">
                                                                Purpose of Loan
                                                            </option>
                                                            <option value="1">Personal</option>
                                                            <option value="1">Education</option>
                                                            <option value="2">Asset Financing</option>
                                                            <option value="3">Home Improvements</option>
                                                            <option value="4">SME Based</option>
                                                            <option value="4">Women in Business</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">

                                            {{-- <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select class="wide">
                                                            <option data-display="Duration">
                                                                Duration
                                                            </option>
                                                            <option value="1">1 month</option>
                                                            <option value="2">2 months</option>
                                                            <option value="3">3 months</option>
                                                            <option value="4">4 months</option>
                                                            <option value="5">5 months</option>
                                                            <option value="6">6 months</option>
                                                            <option value="7">7 months</option>
                                                            <option value="8">8 months</option>
                                                            <option value="9">9 months</option>
                                                            <option value="10">10 months</option>
                                                            <option value="11">11 months</option>
                                                            <option value="12">12 months</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select wire:model.prevent="repayment_plan" class="wide">
                                                            <option data-display="Proposed repayment plan">
                                                                Proposed repayment plan
                                                            </option>
                                                            <option value="1">Weekly</option>
                                                            <option value="2">Monthly</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" wire:model.prevent="phone" value="" id="formPhone" placeholder="Phone">
                                                        <div class="icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="email" wire:model.prevent="email" id="formEmail" placeholder="Email" required="">
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
                                                        <input type="text" wire:model.prevent="gfname" id="gfname" placeholder="Guarantor 1's First Name" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" wire:model.prevent="glname" id="glname" placeholder="Guarantor 1's  Last Name" required="">
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
                                                        <select class="wide">
                                                            <option wire:model.prevent="g_relation" data-display=" Relation">
                                                                Relation
                                                            </option>
                                                            <option value="1">Relative</option>
                                                            <option value="2">Work Mate</option>
                                                            <option value="2">Close Friend</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select wire:model.prevent="g_gender" class="wide">
                                                            <option data-display="Gender">
                                                                Gender
                                                            </option>
                                                            <option value="1">Female</option>
                                                            <option value="2">Male</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" wire:model.prevent="gphone" value="" id="formPhone" placeholder="Guarantor 1's Phone">
                                                        <div class="icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="email" wire:model.prevent="gemail" id="formEmail" placeholder="Guarantor 1's Email" required="">
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
                                                        <input type="text" wire:model.prevent="g2fname" id="g2fname" placeholder="Guarantor 2's First Name" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" wire:model.prevent="g2lname" id="g2lname" placeholder="Guarantor 2's  Last Name" required="">
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
                                                        <select wire:model.prevent="g2_relation" class="wide">
                                                            <option data-display="Relation">
                                                                Relation
                                                            </option>
                                                            <option value="1">Relative</option>
                                                            <option value="2">Work Mate</option>
                                                            <option value="2">Close Friend</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select wire:model.prevent="g2_gender" class="wide">
                                                            <option data-display="Gender">
                                                                Gender
                                                            </option>
                                                            <option value="1">Female</option>
                                                            <option value="2">Male</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" wire:model.prevent="g2phone" value="" id="formPhone" placeholder="Guarantor 2's Phone">
                                                        <div class="icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="email" wire:model.prevent="g2email" id="formEmail" placeholder="Guarantor 2's Email" required="">
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
                                                            <input wire:model.prevent="nrc_file" :file="$nrc_file" class="form-control" type="file" id="formFile" />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Payslip (leave empty if not applicable)</label>
                                                            <input wire:model.prevent="payslip_file" :file="$payslip_file" class="form-control" type="file"  />
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
                                                            <input wire:model.prevent="tpin_file" :file="$tpin_file" class="form-control" type="file"  />
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
                                    <button class="btn btn-warning" wire:click="submit()">Submit</button>
                                </div>
                            </section>
                        </div>
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
        //remove default #finish button
        $('#wizard').find('a[href="#finish"]').remove(); 
        // alert(currentIndex);
        setTimeout(() => {
            $('#wizard .actions li:last-child').append('<a href="#" style="display:block" wire:click="submit" role="menuitem">Send</a>');
        }, 3000);
        //append a submit type button
    });
</script>