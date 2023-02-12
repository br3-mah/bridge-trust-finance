<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="row">
                <!--column-->
                <div class="col-md-6 col-xl-6 col-xxl-12">
                    <div class="row">
                         <!--column-->
                        <div class="col-xl-12">
                             <div class="card prim-card">
                                 <div class="card-body py-3">
                                     <h4 class="number">Loan Wallet Balance</h4>
                                     <div class="d-flex align-items-center justify-content-between">
                                        <div class="prim-info">
                                            <span>Current</span>
                                            <h4>K {{ $current_funds->deposit ?? 0 }}</h4>
                                        </div>
                                        <div class="prim-info">
                                            <span>Withdrawn</span>
                                            <h4>K 0</h4>
                                        </div>
                                        <div class="prim-info">
                                        </div>
                                         <div class="master-card">
                                             <svg width="55" height="35" viewBox="0 0 55 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <circle opacity="0.5" cx="17.5" cy="17.5" r="17.5" fill="#FCFCFC"/>
                                                 <circle opacity="0.5" cx="37.5" cy="17.5" r="17.5" fill="#FCFCFC"/>
                                             </svg>	
                                             <span class="text-white d-block mt-1">Loan Wallet</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                        </div>
                     <!--/column-->
                      <!--column-->
                        <div class="col-xl-12">
                             <div class="card recent-activity">
                                 <div class="card-header pb-0 border-0 pt-3">
                                     <h2 class="heading mb-0">Recent Updates</h2>
                                 </div>
                                 <div class="card-body p-0 pb-3">
                                     <div class="recent-info">
                                         <div class="recent-content">
                                             <span class="recent_icon">
                                                 <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <path d="M14.0038 25.4285C11.7434 25.4285 9.53382 24.7582 7.6544 23.5024C5.77498 22.2466 4.31015 20.4617 3.44515 18.3734C2.58015 16.2851 2.35382 13.9872 2.7948 11.7703C3.23577 9.55337 4.32424 7.51699 5.92255 5.91868C7.52087 4.32036 9.55724 3.2319 11.7742 2.79092C13.9911 2.34995 16.289 2.57627 18.3773 3.44127C20.4656 4.30627 22.2505 5.7711 23.5063 7.65052C24.7621 9.52994 25.4323 11.7395 25.4323 13.9999C25.429 17.0299 24.2239 19.9349 22.0813 22.0774C19.9388 24.22 17.0338 25.4251 14.0038 25.4285ZM14.0038 4.85704C12.1955 4.85704 10.4278 5.39326 8.92427 6.39789C7.42074 7.40252 6.24887 8.83044 5.55687 10.5011C4.86487 12.1717 4.68381 14.01 5.03659 15.7836C5.38937 17.5571 6.26014 19.1862 7.5388 20.4649C8.81745 21.7435 10.4465 22.6143 12.2201 22.9671C13.9936 23.3199 15.832 23.1388 17.5026 22.4468C19.1732 21.7548 20.6011 20.5829 21.6058 19.0794C22.6104 17.5759 23.1466 15.8082 23.1466 13.9999C23.1439 11.5759 22.1798 9.25196 20.4657 7.53793C18.7517 5.8239 16.4278 4.85976 14.0038 4.85704Z" fill="#FCFCFC"/>
                                                     <path d="M15.1466 18.5714H11.7181C11.4149 18.5714 11.1243 18.451 10.9099 18.2367C10.6956 18.0224 10.5752 17.7317 10.5752 17.4286C10.5752 17.1255 10.6956 16.8348 10.9099 16.6204C11.1243 16.4061 11.4149 16.2857 11.7181 16.2857H15.1466V15.1428H12.8609C12.2547 15.1428 11.6733 14.902 11.2447 14.4734C10.816 14.0447 10.5752 13.4633 10.5752 12.8571V11.7143C10.5752 11.1081 10.816 10.5267 11.2447 10.098C11.6733 9.66937 12.2547 9.42856 12.8609 9.42856H16.2895C16.5926 9.42856 16.8833 9.54897 17.0976 9.76329C17.3119 9.97762 17.4323 10.2683 17.4323 10.5714C17.4323 10.8745 17.3119 11.1652 17.0976 11.3795C16.8833 11.5939 16.5926 11.7143 16.2895 11.7143H12.8609V12.8571H15.1466C15.7528 12.8571 16.3342 13.0979 16.7629 13.5266C17.1915 13.9553 17.4323 14.5366 17.4323 15.1428V16.2857C17.4323 16.8919 17.1915 17.4733 16.7629 17.9019C16.3342 18.3306 15.7528 18.5714 15.1466 18.5714Z" fill="#FCFCFC"/>
                                                     <path d="M14.0032 11.7142C13.7001 11.7142 13.4094 11.5937 13.1951 11.3794C12.9808 11.1651 12.8604 10.8744 12.8604 10.5713V9.42844C12.8604 9.12534 12.9808 8.83465 13.1951 8.62032C13.4094 8.40599 13.7001 8.28558 14.0032 8.28558C14.3063 8.28558 14.597 8.40599 14.8113 8.62032C15.0257 8.83465 15.1461 9.12534 15.1461 9.42844V10.5713C15.1461 10.8744 15.0257 11.1651 14.8113 11.3794C14.597 11.5937 14.3063 11.7142 14.0032 11.7142ZM14.0032 19.7142C13.7001 19.7142 13.4094 19.5937 13.1951 19.3794C12.9808 19.1651 12.8604 18.8744 12.8604 18.5713V17.4284C12.8604 17.1253 12.9808 16.8346 13.1951 16.6203C13.4094 16.406 13.7001 16.2856 14.0032 16.2856C14.3063 16.2856 14.597 16.406 14.8113 16.6203C15.0257 16.8346 15.1461 17.1253 15.1461 17.4284V18.5713C15.1461 18.8744 15.0257 19.1651 14.8113 19.3794C14.597 19.5937 14.3063 19.7142 14.0032 19.7142Z" fill="#FCFCFC"/>
                                                 </svg>
                                             </span>
                                             <div class="user-name">
                                                 <h6>Payment </h6>
                                                 <span>2 March 2023, 13:45 PM</span>
                                             </div>
                                         </div>
                                         <div class="count">
                                             <span>K2000</span>
                                         </div>
                                     </div>
                                     <div class="recent-info">
                                         <div class="recent-content">
                                             <span class="recent_icon">
                                                 <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <path d="M20.0038 0.857117H4.00377C3.09445 0.857117 2.22238 1.21834 1.5794 1.86132C0.936419 2.5043 0.575195 3.37637 0.575195 4.28569V15.7143C0.575195 16.6236 0.936419 17.4956 1.5794 18.1386C2.22238 18.7816 3.09445 19.1428 4.00377 19.1428H20.0038C20.9131 19.1428 21.7852 18.7816 22.4281 18.1386C23.0711 17.4956 23.4323 16.6236 23.4323 15.7143V4.28569C23.4323 3.37637 23.0711 2.5043 22.4281 1.86132C21.7852 1.21834 20.9131 0.857117 20.0038 0.857117ZM2.86091 4.28569C2.86091 3.98258 2.98132 3.69189 3.19565 3.47757C3.40997 3.26324 3.70066 3.14283 4.00377 3.14283H20.0038C20.3069 3.14283 20.5976 3.26324 20.8119 3.47757C21.0262 3.69189 21.1466 3.98258 21.1466 4.28569V5.42854H2.86091V4.28569ZM21.1466 15.7143C21.1466 16.0174 21.0262 16.3081 20.8119 16.5224C20.5976 16.7367 20.3069 16.8571 20.0038 16.8571H4.00377C3.70066 16.8571 3.40997 16.7367 3.19565 16.5224C2.98132 16.3081 2.86091 16.0174 2.86091 15.7143V7.71426H21.1466V15.7143Z" fill="#FCFCFC"/>
                                                     <path d="M5.14676 11.1429H7.43248C7.73558 11.1429 8.02627 11.0225 8.2406 10.8081C8.45493 10.5938 8.57533 10.3031 8.57533 10C8.57533 9.6969 8.45493 9.40621 8.2406 9.19188C8.02627 8.97756 7.73558 8.85715 7.43248 8.85715H5.14676C4.84366 8.85715 4.55297 8.97756 4.33864 9.19188C4.12431 9.40621 4.00391 9.6969 4.00391 10C4.00391 10.3031 4.12431 10.5938 4.33864 10.8081C4.55297 11.0225 4.84366 11.1429 5.14676 11.1429Z" fill="#FCFCFC"/>
                                                 </svg>
                                             </span>
                                             <div class="user-name">
                                                 <h6>Subcription</h6>
                                                 <span>2 March 2023, 13:45 PM</span>
                                             </div>
                                         </div>
                                         <div class="count">
                                             <span>-$120</span>
                                         </div>
                                     </div>
                                     
                                 </div>
                             </div>
                        </div>
                     <!--/column-->
                    </div>

                    <button class="btn btn-primary btn-square" data-bs-toggle="modal" data-bs-target="#loanWalletFundsModal" >Update Loan Wallet Funds</button>
                </div>
             <!--/column-->
            </div>
        </div>
    </div>


    <div class="modal fade" id="loanWalletFundsModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Wallet Funds </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                
                <form method="POST" wire:submit.prevent="store()">
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="basic-form">
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control" wire:model.defer="amount" value="{{ old('amount') }}" type="text" placeholder="Amount">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>

