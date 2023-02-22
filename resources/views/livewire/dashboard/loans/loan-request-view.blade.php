<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Loans</h4>
                        <button data-bs-toggle="modal" data-bs-target="#createNewLoanMain" class="btn btn-square btn-primary">New Loan</button>
                    </div>
                    <div class="card-body pb-0" style="padding-bottom: 30%">
                        @if (Session::has('attention'))
                        <div wire:ignore class="intro-x alert alert-secondary w-1/2 alert-dismissible justify-center show flex items-center mb-2" role="alert"> 
                            <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> 
                            {{ Session::get('attention') }}
                            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> 
                                <i data-lucide="x" class="w-4 h-4"></i> 
                            </button> 
                        </div>
                        @elseif (Session::has('error_msg'))
                        <div wire:ignore class="intro-x alert alert-danger w-1/2 alert-dismissible justify-center show flex items-center mb-2" role="alert"> 
                            <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> 
                            {{ Session::get('error_msg') }}
                            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> 
                                <i data-lucide="x" class="w-4 h-4"></i> 
                            </button> 
                        </div>
                        @endif
                        <div class="table-responsive patient">
                            <div wire:ignore class="row py-2">
                                {{-- Admin Only --}}
                                @can('accept and reject loan requests')
                                <div class="col-xl-3 center">
                                    <select multiple wire:model.lazy="status" class="default-select form-control wide mt-3" aria-placeholder="Settlement Type" placeholder="Status">
                                        <option value="[0,1,2,3]">Any</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Accepted</option>
                                        <option value="2">Under Review</option>
                                        <option value="3">Rejected</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 center">
                                    <select multiple wire:model.lazy="type" class="default-select form-control wide mt-3" aria-placeholder="Loan" placeholder="Loan Types">
                                        <option value="Personal">Personal</option>
                                        <option value="Education">Education</option>
                                        <option value="Asset Financing">Asset Financing</option>
                                        <option value="Home Improvement">Home Improvements</option>
                                        <option value="Agri Business">Agri Business</option>
                                        <option value="Women in Business (Femiprise) Soft">Women in Business</option>
                                    </select>
                                </div>
                                @endcan
                                <div class="col-xl-3 center">
                                    <button class="btn btn-primary" title="View Grid">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-3x3-gap" viewBox="0 0 16 16">
                                            <path d="M4 2v2H2V2h2zm1 12v-2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm5 10v-2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zM9 2v2H7V2h2zm5 0v2h-2V2h2zM4 7v2H2V7h2zm5 0v2H7V7h2zm5 0h-2v2h2V7zM4 12v2H2v-2h2zm5 0v2H7v-2h2zm5 0v2h-2v-2h2zM12 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zm-1 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zm1 4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-2z"/>
                                        </svg>
                                    </button>
                                </div>
                                {{-- End Amin Only --}}
                            </div>
                            @include('livewire.dashboard.__parts.dash-alerts')
                            <table wire:ignore.self wire:poll id="example5" class="display" style="min-width: 845px; position:relative;">
                                <thead>
                                    <tr>
                                        {{-- <th>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th> --}}
                                        <th>Loan #.</th>
                                        <th>Borrower</th>
                                        <th>Loan Type</th>
                                        <th>Principal</th>
                                        <th>Interest(%)</th>
                                        <th>Due</th>
                                        <th>Paid</th>
                                        <th>Balance</th>
                                        <th>Last Payment</th>
                                        <th>Status</th>
                                        <th>Date Sent</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="top:0; padding-bottom:20px">
                                    
                                    @forelse($loan_requests as $loan)
                                    <tr>
                                        {{-- <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td> --}}
                                        <td style="">L{{ $loan->id }}</td>
                                        <td style="">{{ $loan->fname.' '. $loan->lname }}</td>
                                        <td style="">{{ $loan->type }}</td>
                                        <td style="">{{ $loan->amount }}</td>
                                        <td style="">{{ 20 }}</td>
                                        <td style="">{{ 0.00 }}</td>
                                        <td style="">{{ 0.00 }}</td>
                                        <td style="">{{ 0.00}}</td>
                                        <td>{{ $loan->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            @if($loan->status == 0)
                                            <span class="badge badge-sm light badge-danger">
                                                <i class="fa fa-circle text-danger me-1"></i>
                                                Pending
                                            </span>
                                            @elseif($loan->status == 1)
                                            <span class="badge badge-sm light badge-success">
                                                <i class="fa fa-circle text-success me-1"></i>
                                                Accepted
                                            </span>
                                            @elseif($loan->status == 2)
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
                                        </td>
                                        <td style="">{{ $loan->created_at->toFormattedDateString() }}</td>
                                        <td class="d-flex">
                                            {{-- @can('view loan details') --}}
                                            <div class="btn sharp  tp-btn ms-auto">
                                                <a href="{{ route('loan-details',['id' => $loan->id]) }}">  
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                    </svg>                                                
                                                </a>
                                            </div>
                                            &nbsp;
                                            <div class="btn sharp tp-btn ms-auto">
                                                <a target="_blank" title="View Loan Statement" href="{{ route('loan-statement', ['id'=>$loan->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-ruled" viewBox="0 0 16 16">
                                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h7v1a1 1 0 0 1-1 1H6zm7-3H6v-2h7v2z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            @can('accept and reject loan requests')
                                            <div class="dropdown ms-auto text-end">
                                                <div wire:ignore.self wire:poll class="dropdown-menu dropdown-menu-start">
                                                    @if($loan->status !== 1)
                                                    <a wire:click="accept({{ $loan->id }})" onclick="confirm('Are you sure you want to approve and accept this loan application') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                                                        Accept Request
                                                    </a>
                                                    @endif
                                                    @if($loan->status !== 2)
                                                    <a wire:click="stall({{ $loan->id }})"onclick="confirm('Are you sure you want to set this loan request on hold') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                                                        Stall
                                                    </a>
                                                    @endif
                                                    @if($loan->status !== 3)
                                                    <a wire:click="reject({{ $loan->id }})"onclick="confirm('Are you sure you want to reject this loan') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                                                        Reject Loan Request
                                                    </a>
                                                    @endif
                                                    {{-- <a @disabled(true) disabled class="dropdown-item" href="#">View More Details</a> --}}
                                                </div>
                                                <div class="btn sharp btn-primary tp-btn ms-auto" data-bs-toggle="dropdown">
                                                    <svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.5202 17.4167C13.5202 18.81 12.3927 19.9375 10.9994 19.9375C9.60601 19.9375 8.47852 18.81 8.47852 17.4167C8.47852 16.0233 9.60601 14.8958 10.9994 14.8958C12.3927 14.8958 13.5202 16.0233 13.5202 17.4167ZM9.85352 17.4167C9.85352 18.0492 10.3669 18.5625 10.9994 18.5625C11.6319 18.5625 12.1452 18.0492 12.1452 17.4167C12.1452 16.7842 11.6319 16.2708 10.9994 16.2708C10.3669 16.2708 9.85352 16.7842 9.85352 17.4167Z" fill="#2696FD"/>
                                                    <path d="M13.5202 4.58369C13.5202 5.97699 12.3927 7.10449 10.9994 7.10449C9.60601 7.10449 8.47852 5.97699 8.47852 4.58369C8.47852 3.19029 9.60601 2.06279 10.9994 2.06279C12.3927 2.06279 13.5202 3.19029 13.5202 4.58369ZM9.85352 4.58369C9.85352 5.21619 10.3669 5.72949 10.9994 5.72949C11.6319 5.72949 12.1452 5.21619 12.1452 4.58369C12.1452 3.95119 11.6319 3.43779 10.9994 3.43779C10.3669 3.43779 9.85352 3.95119 9.85352 4.58369Z" fill="#2696FD"/>
                                                    <path d="M13.5202 10.9997C13.5202 12.393 12.3927 13.5205 10.9994 13.5205C9.60601 13.5205 8.47852 12.393 8.47852 10.9997C8.47852 9.6063 9.60601 8.4788 10.9994 8.4788C12.3927 8.4788 13.5202 9.6063 13.5202 10.9997ZM9.85352 10.9997C9.85352 11.6322 10.3669 12.1455 10.9994 12.1455C11.6319 12.1455 12.1452 11.6322 12.1452 10.9997C12.1452 10.3672 11.6319 9.8538 10.9994 9.8538C10.3669 9.8538 9.85352 10.3672 9.85352 10.9997Z" fill="#2696FD"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            @endcan	
                                        </td>	
                                    </tr>
                                    @empty
                                    <div class="intro-y col-span-12 md:col-span-6">
                                        <div class="box text-center">
                                            <p>Nothing Found.</p>
                                        </div>
                                    </div>
                                    @endforelse
                                    @if($loan_requests->count() < 2)
                                    <tr style="height: 15vh">
                                    
                                    </tr>
                                    @endif
                                    {{-- <tr>
                                        <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox4" required="">
                                                <label class="form-check-label" for="customCheckBox4"></label>
                                            </div>
                                        </td>
                                        <td>#P-00003</td>
                                        <td>26/02/2020, 12:42 AM</td>
                                        <td>Ashton Cox</td>
                                        <td>Dr. Rhona</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge badge-sm light badge-success">
                                                <i class="fa fa-circle text-success me-1"></i>
                                                Recovered
                                            </span>
                                        </td>
                                        <td>AB-003</td>
                                        <td>
                                            <div class="dropdown ms-auto text-end">
                                                <div class="btn sharp btn-primary tp-btn ms-auto" data-bs-toggle="dropdown">
                                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.5202 17.4167C13.5202 18.81 12.3927 19.9375 10.9994 19.9375C9.60601 19.9375 8.47852 18.81 8.47852 17.4167C8.47852 16.0233 9.60601 14.8958 10.9994 14.8958C12.3927 14.8958 13.5202 16.0233 13.5202 17.4167ZM9.85352 17.4167C9.85352 18.0492 10.3669 18.5625 10.9994 18.5625C11.6319 18.5625 12.1452 18.0492 12.1452 17.4167C12.1452 16.7842 11.6319 16.2708 10.9994 16.2708C10.3669 16.2708 9.85352 16.7842 9.85352 17.4167Z" fill="#2696FD"/>
                                                    <path d="M13.5202 4.58369C13.5202 5.97699 12.3927 7.10449 10.9994 7.10449C9.60601 7.10449 8.47852 5.97699 8.47852 4.58369C8.47852 3.19029 9.60601 2.06279 10.9994 2.06279C12.3927 2.06279 13.5202 3.19029 13.5202 4.58369ZM9.85352 4.58369C9.85352 5.21619 10.3669 5.72949 10.9994 5.72949C11.6319 5.72949 12.1452 5.21619 12.1452 4.58369C12.1452 3.95119 11.6319 3.43779 10.9994 3.43779C10.3669 3.43779 9.85352 3.95119 9.85352 4.58369Z" fill="#2696FD"/>
                                                    <path d="M13.5202 10.9997C13.5202 12.393 12.3927 13.5205 10.9994 13.5205C9.60601 13.5205 8.47852 12.393 8.47852 10.9997C8.47852 9.6063 9.60601 8.4788 10.9994 8.4788C12.3927 8.4788 13.5202 9.6063 13.5202 10.9997ZM9.85352 10.9997C9.85352 11.6322 10.3669 12.1455 10.9994 12.1455C11.6319 12.1455 12.1452 11.6322 12.1452 10.9997C12.1452 10.3672 11.6319 9.8538 10.9994 9.8538C10.3669 9.8538 9.85352 10.3672 9.85352 10.9997Z" fill="#2696FD"/>
                                                    </svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr> --}}
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal --}}
    <div wire:ignore class="modal fade" id="createNewLoanMain" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
    
                <div id="smartwizard" class="form-wizard order-create">
                    <ul class="nav nav-wizard">
                        <li>
                            <a class="nav-link" href="#wizard_Service"> 
                                <span>1</span> 
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#wizard_Time">
                                <span>2</span>
                            </a>
                        </li>
                        {{-- <li><a class="nav-link" href="#wizard_Details">
                            <span>3</span>
                        </a></li> --}}
                        <li>
                            <a class="nav-link" href="#wizard_Payment">
                                <span>3</span>
                            </a>
                        </li>
                    </ul>
                    <form id="kyc_form" class="tab-content" action="{{ route("loan-request") }}" method="POST" enctype="multipart/form-data">
                        <div id="wizard_Service" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">First Name*</label>
                                        <input type="text" value="{{ auth()->user()->fname }}" wire:model="fname" class="form-control" placeholder="{{ auth()->user()->fname ?? 'John' }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Last Name*</label>
                                        <input type="text" value="{{ auth()->user()->lname }}" wire:model="lname" class="form-control" placeholder="{{ auth()->user()->lname ?? 'Doe' }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Email Address*</label>
                                        <input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="{{ auth()->user()->email ?? 'example@mail.com' }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Phone Number*</label>
                                        <input type="text" value="{{ auth()->user()->phone }}" wire:model="phone" class="form-control" placeholder="(+260)97-000-999" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Gender*</label>
                                        <select type="text" wire:model="gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>                                
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Purpose for Loan*</label>
                                        <select type="text" wire:model="type" class="form-control">
                                            <option value="Personal">Personal Loan</option>
                                            <option value="Educational">Educational Loan</option>
                                            <option value="Vehicle">Vehicle Loan</option>
                                            <option value="Home Improvement">Home Improvement Loan</option>
                                            <option value="SME">SME Loan</option>
                                            <option value="Women In Business (Soft)">Women In Business (Soft) Loan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Duration*</label>
                                        <select type="text" wire:model="duration" class="form-control">
                                            <option value="1 Week">1 Week</option>
                                            <option value="1 Month">1 Week</option>
                                            <option value="2 Months">2 Month</option>
                                            <option value="3 Months">3 Months</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Your Gender*</label>
                                        <input type="text" wire:model="place" class="form-control" required>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div id="wizard_Time" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's First Name*</label>
                                        <input type="text" wire:model="gfname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's Last Name*</label>
                                        <input type="text" wire:model="glname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's Email Address*</label>
                                        <input type="email" wire:model="gemail" class="form-control" id="emial1" placeholder="example@example.com.com" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's Phone Number*</label>
                                        <input type="text" wire:model="gphone" class="form-control" placeholder="(+1)408-657-9007" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Relation*</label>
                                        <select type="text" wire:model="g_relation" class="form-control">
                                            <option value="Work Mate">Work Mate</option>
                                            <option value="Relative">Relative</option>
                                            <option value="Close Friend">Close Friend</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Gender*</label>
                                        <select type="text" wire:model="g_gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select> 
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's First Name*</label>
                                        <input type="text" wire:model="g2fname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's Last Name*</label>
                                        <input type="text" wire:model="g2lname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's Email Address*</label>
                                        <input type="email" wire:model="g2email" class="form-control" id="emial1" placeholder="example@example.com.com" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's Phone Number*</label>
                                        <input type="text" wire:model="g2phone" class="form-control" placeholder="(+1)408-657-9007" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Relation*</label>
                                        <select type="text" wire:model="g2_relation" class="form-control">
                                            <option value="Work Mate">Work Mate</option>
                                            <option value="Relative">Relative</option>
                                            <option value="Close Friend">Close Friend</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Gender*</label>
                                        <select type="text" wire:model="g2_gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div id="wizard_Details" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <h4>Monday *</h4>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="9.00" type="number" name="input1" id="input1">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="6.00" type="number" name="input2" id="input2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <h4>Tuesday *</h4>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="9.00" type="number" name="input3" id="input3">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="6.00" type="number" name="input4" id="input4">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <h4>Wednesday *</h4>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="9.00" type="number" name="input5" id="input5">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="6.00" type="number" name="input6" id="input6">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <h4>Thrusday *</h4>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="9.00" type="number" name="input7" id="input7">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="6.00" type="number" name="input8" id="input8">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <h4>Friday *</h4>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="9.00" type="number" name="input9" id="input9">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="6.00" type="number" name="input10" id="input10">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div id="wizard_Payment" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">NRC Copy*</label>
                                        <input type="file" name="nrc_file" class="form-control" id="nrcFile" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Payslip (leave empty if not applicable)</label>
                                        <input type="file" name="payslip_file" class="form-control" id="payslip_file" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">TPIN*</label>
                                        <input type="file" name="tpin_file" class="form-control" id="tpin_file" required>
                                    </div>
                                </div>
                            </div>
    
                            {{-- <div class="row">
                                <div class="col-12">
                                    <div class="skip-email text-center">
                                        <p>Or if want skip this step entirely and setup it later</p>
                                        <a href="javascript:void(0)">Skip step</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
    
            </div>
        </div>
    </div>
</div>
