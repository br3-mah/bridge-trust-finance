<div class="col-xl-12">
    <div class="card">
            <div class="card-header border-0 align-items-start pb-0">
                <div>
                    <span class="fs-18 d-block mb-2">{{ 'Your '.$my_loan->type ?? 'Your ' }} Loan Request</span>
                    <h2 class="fs-30 font-w600 ">K {{ $my_loan->amount ?? 0.00 }}</h2>
                </div>
                {{-- <div class="dropdown send style-1">
                    <a href="javascript:void(0);" class="btn-link btn sharp tp-btn-light btn-primary pill" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.47908 4.58333C8.47908 3.19 9.60659 2.0625 10.9999 2.0625C12.3933 2.0625 13.5208 3.19 13.5208 4.58333C13.5208 5.97667 12.3933 7.10417 10.9999 7.10417C9.60658 7.10417 8.47908 5.97667 8.47908 4.58333ZM12.1458 4.58333C12.1458 3.95083 11.6324 3.4375 10.9999 3.4375C10.3674 3.4375 9.85408 3.95083 9.85408 4.58333C9.85408 5.21583 10.3674 5.72917 10.9999 5.72917C11.6324 5.72917 12.1458 5.21583 12.1458 4.58333Z" fill="#fff" />
                            <path d="M8.47908 17.4163C8.47908 16.023 9.60659 14.8955 10.9999 14.8955C12.3933 14.8955 13.5208 16.023 13.5208 17.4163C13.5208 18.8097 12.3933 19.9372 10.9999 19.9372C9.60658 19.9372 8.47908 18.8097 8.47908 17.4163ZM12.1458 17.4163C12.1458 16.7838 11.6324 16.2705 10.9999 16.2705C10.3674 16.2705 9.85408 16.7838 9.85408 17.4163C9.85408 18.0488 10.3674 18.5622 10.9999 18.5622C11.6324 18.5622 12.1458 18.0488 12.1458 17.4163Z" fill="#fff" />
                            <path d="M8.47908 11.0003C8.47908 9.60699 9.60659 8.47949 10.9999 8.47949C12.3933 8.47949 13.5208 9.60699 13.5208 11.0003C13.5208 12.3937 12.3933 13.5212 10.9999 13.5212C9.60658 13.5212 8.47908 12.3937 8.47908 11.0003ZM12.1458 11.0003C12.1458 10.3678 11.6324 9.85449 10.9999 9.85449C10.3674 9.85449 9.85408 10.3678 9.85408 11.0003C9.85408 11.6328 10.3674 12.1462 10.9999 12.1462C11.6324 12.1462 12.1458 11.6328 12.1458 11.0003Z" fill="#fff" />
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                    </div>
                </div> --}}
            </div>
            <div class="card-body py-4 pt-md-2">
                <div class="row">
                    <div class="value-data col-xl-3 col-md-4 col-6">
                        <p class="mb-1">APPLICATION STATUS</p>
                        
                    @if($my_loan->complete == 1)
                        <h4 class="mb-0 font-w500 text-white">
                            @if($my_loan->status == 0)
                            <span class="badge badge-sm light badge-danger">
                                <i class="fa fa-circle text-danger me-1"></i>
                                Pending for Approval
                            </span>
                            @elseif($my_loan->status == 1)
                            <span class="badge badge-sm light badge-success">
                                <i class="fa fa-circle text-success me-1"></i>
                                Accepted
                            </span>
                            @elseif($my_loan->status == 2)
                            <span class="badge badge-sm light badge-warning">
                                <i class="fa fa-circle text-warning me-1"></i>
                                Under Review
                            </span>
                            @else
                            <span class="badge badge-sm light badge-default">
                                <i class="fa fa-circle text-warning me-1"></i>
                                Rejected
                            </span>
                            @endif
                        </h4>
                    @else 
                        <span class="badge badge-sm light badge-default">
                            <i class="fa fa-circle text-warning me-1"></i>
                            Incomplete KYC Profile
                        </span>
                    @endif
                    </div>
                    
                    @if($my_loan->status == 1)
                    <div class="value-data col-xl-3 col-md-4 col-6">
                        <p class="mb-1">DURATION</p>
                        <h4 class="mb-0 font-w500 text-primary">{{ $my_loan->repayment_plan }}</h4>
                    </div>
                    <div class="value-data col-xl-3 col-md-4 col-6">
                        <p class="mb-1">DUE DATE</p>
                        <h4 class="mb-0 font-w500 text-primary">{{ $my_loan->due_date ?? '' }}</h4>
                    </div>
                    @endif
                </div>
            </div>
            
            <div wire:poll class="row p-4">
                @dd($my_loan->complete)
                @if($my_loan->complete == 1)
                    @if($my_loan->status == 1)
                    <div class="col-xl-6 col-xxl-6 col-lg-6">
                        <div class="widget-stat card bg-danger ">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3">
                                        <i class="la la-money"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1 text-white">{{ $my_loan->type }} Loan Payback Total</p>
                                        <h3 class="text-white">K {{ App\Models\Application::payback($my_loan->amount, preg_replace('/[^0-9]/','', $my_loan->repayment_plan)) }}</h3>
                                        {{-- <div class="progress mb-2 bg-secondary">
                                            <div class="progress-bar progress-animated bg-white" style="width: 30%"></div>
                                        </div> --}}
                                        {{-- <small>10% penalty addition after Due</small> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-xl-6 col-xxl-6 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-xl-12">
                                    <div class="alert alert-success left-icon-big alert-dismissible fade show">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                        </button>
                                        <div class="media">
                                            <div class="alert-left-icon-big">
                                                <span>
                                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-1 mb-2">Your Loan Application is Pending</h5>
                                                <p class="mb-0">
                                                    Congratulations!, your {{$my_loan->type}} loan application is now pending for approval.
                                                    Waiting for loan approval - one step closer to financial freedom!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{ route('profile.show') }}" class="btn btn-primary">Complete your (KYC) profile</a> --}}
                                {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#completeKYCmodal" class="btn btn-primary">Continue Application</button> --}}
                                {{-- <button type="button" class="btn btn-light">Cancel Application</button> --}}
                            </div>
                        </div>
                    </div>
                    @endif
                @else
                <div class="col-xl-6 col-xxl-6 col-lg-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-xl-12">
                                <div class="alert alert-warning left-icon-big alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                    </button>
                                    <div class="media">
                                        <div class="alert-left-icon-big">
                                            <span><i class="mdi mdi-help-circle-outline"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-1 mb-2">Complete Your Profile Details</h5>
                                            <p class="mb-0">Your {{$my_loan->type}} loan application is not finished yet, please <a href="{{url('/user/profile')}}">complete your KYC profile</a> to complete the loan request.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('profile.show') }}" class="btn btn-primary">Complete your (KYC) profile</a>
                            {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#completeKYCmodal" class="btn btn-primary">Continue Application</button> --}}
                            {{-- <button type="button" class="btn btn-light">Cancel Application</button> --}}
                        </div>
                    </div>
                </div>
                @endif
            </div>
    </div>
</div>