<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Loans</h4>
                        @hasanyrole('admin')
                        <button data-bs-toggle="modal" data-bs-target="#createNewLoanMain" class="btn btn-square btn-primary">New Loan</button>
                        {{-- @else --}}
                        {{-- <a class="text-white btn btn-square btn-primary" href="{{ route('apply-for', ['id' => auth()->user()->id]) }}"> New Loan Request</a> --}}
                        @endhasanyrole
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
                        <div wire:ignore.self  class="table-responsive patient">
                            <div class="row py-2">
                                {{-- Admin Only --}}
                                @can('accept and reject loan requests')
                                <div wire:ignore class="col-xl-3 center">
                                    <select multiple wire:model.lazy="status" class="default-select form-control wide mt-3" aria-placeholder="Settlement Type" placeholder="Status">
                                        <option value="[0,1,2,3]">Any</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Accepted</option>
                                        <option value="2">Under Review</option>
                                        <option value="3">Rejected</option>
                                    </select>
                                </div>
                                <div wire:ignore class="col-xl-3 center">
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
                                <div class="col-xl-6 center">
                                    <button wire:click="changeView('grid')" class="mt-3 btn {{ $view === 'grid' ? 'btn-primary':'btn-light' }} btn-square" title="View Grid">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-3x3-gap" viewBox="0 0 16 16">
                                            <path d="M4 2v2H2V2h2zm1 12v-2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm5 10v-2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zM9 2v2H7V2h2zm5 0v2h-2V2h2zM4 7v2H2V7h2zm5 0v2H7V7h2zm5 0h-2v2h2V7zM4 12v2H2v-2h2zm5 0v2H7v-2h2zm5 0v2h-2v-2h2zM12 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zm-1 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zm1 4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-2z"/>
                                        </svg>
                                    </button>
                                    <button wire:click="changeView('table')" class="mt-3 btn {{ $view === 'table' ? 'btn-primary':'btn-light' }} btn-square" title="View Grid">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                                        </svg>
                                    </button>
                                    <button wire:click="changeView('assesment')" class="mt-3 btn {{ $view === 'assesment' ? 'btn-primary':'btn-light' }} btn-square" title="View Assesement">
                                        Assesment
                                        <span class="btn-icon-end">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet-fill" viewBox="0 0 16 16">
                                                <path d="M6 12v-2h3v2H6z"/>
                                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM3 9h10v1h-3v2h3v1h-3v2H9v-2H6v2H5v-2H3v-1h2v-2H3V9z"/>
                                              </svg>
                                        </span>
                                    </button>
                                </div>
                                {{-- End Amin Only --}}
                            </div>
                            @include('livewire.dashboard.__parts.dash-alerts')
                            
                            
                            
                            {{-- Defualt Table --}}
                            @if($view === 'table')
                                @include('livewire.dashboard.loans.__parts.defualt-loan-request-table')
                            @endif
                            {{-- End Default Table --}}

                            {{-- Card Grid --}}
                            @if($view === 'grid')
                                @include('livewire.dashboard.loans.__parts.grid-loan-requests')
                            @endif
                            {{-- End Card Grid --}}

                            {{-- Defualt Assesment Table --}}
                            @if($view === 'assesment')
                                @include('livewire.dashboard.loans.__parts.assesment-loan-request-table')
                            @endif
                            {{-- End defualt assement table --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal --}}
    <div wire:ignore.self class="modal fade" id="updateDueDate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-header bg-primary text-white">
                <h3 style="color:#fff">{{ $loan_request->type }} Loan</h3>
                <h5 style="color:#fff">{{ $loan_request->fname.' '.$loan_request->lname }}</h5>
            </div>
            <div class="modal-content p-4">
                @if ($loan_request !== null)
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <h5>Amount: {{ $loan_request->amount }}</h5>
                        <h5>Duration: {{ $loan_request->repayment_plan }} Months</h5>
                        <h6>Submitted on {{ $loan_request->created_at->toFormattedDateString() }}</h6>
                    </div>
                    
                </div>
                @endif
                <div class="col-xl-12">
                    <div class="mb-3">
                        <div>
                            <h5 class="text-label form-label text-warning">Change Due Date (Optional)</h5>
                            <input placeholder="yyyy-mm-dd" name="datepicker" wire:model.defer="due_date" class=" form-control" id="">
                        </div>
                        <br>
                        <button modal-bs-dismiss="close" wire:click="clear()" class="btn btn-light btn-square">Cancel</button>
                        @if($loan_request !== null)
                        <button wire:click="accept({{ $loan_request->id }})" class="btn btn-primary btn-square">Approve Loan</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                    <form id="kyc_form" class="tab-content" action="{{ route("proxy-apply-loan") }}" method="POST" style="min-height:60vh" enctype="multipart/form-data">
                        @csrf
                        <div id="wizard_Service" class="tab-pane" role="tabpanel">
                            <div class="row">
                                
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Borrower*</label>
                                        <select type="text" name="borrower_id" class="form-control">
                                            @forelse ($users as $user)
                                                @if(empty($user->loans->toArray()))
                                                    <option value="{{ $user->id }}">{{ $user->fname.' '.$user->lname}}</option>
                                                @endif
                                            @empty
                                            <option>No Borrowers Available. <a target="_blank" href="{{ route('borrowers') }}">Add Borrowers</a></option>
                                            @endforelse
                                        </select>                                
                                    </div>
                                </div>
                                <input type="hidden" name="proxyloan" value="proxyloan">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Purpose for Loan*</label>
                                        <select type="text" name="type" class="form-control">
                                            <option value="Personal">Personal</option>
                                            <option value="Education">Education</option>
                                            <option value="Asset Financing">Asset Financing</option>
                                            <option value="Home Improvement">Home Improvements</option>
                                            <option value="Agri Business">Agri Business</option>
                                            <option value="Women in Business (Femiprise) Soft">Women in Business (Femiprise) Soft Loan</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Amount (ZMW)</label>
                                        <input type="text" name="amount" class="form-control" placeholder="0.00" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Duration*</label>
                                        <select type="text" name="repayment_plan" class="form-control">
                                            <option value="1">1 Month</option>
                                            <option value="2">2 Month</option>
                                            <option value="3">3 Months</option>
                                            <option value="4">4 Months</option>
                                            <option value="5">5 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="7">7 Months</option>
                                            <option value="8">8 Months</option>
                                            <option value="9">9 Months</option>
                                            <option value="10">10 Months</option>
                                            <option value="11">11 Months</option>
                                            <option value="12">12 Months</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Borrower KYC*</label>
                                        <select type="text" name="bypass" class="form-control">
                                            <option value="true">Bypass KYC Update</option>
                                            <option value="false">Do Not Bypass KYC</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Your Gender*</label>
                                        <input type="text" name="place" class="form-control" required>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div id="wizard_Time" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's First Name*</label>
                                        <input type="text" name="gfname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's Last Name*</label>
                                        <input type="text" name="glname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's Email Address*</label>
                                        <input type="email" name="gemail" class="form-control" id="emial1" placeholder="example@example.com.com" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's Phone Number*</label>
                                        <input type="text" name="gphone" class="form-control" placeholder="(+1)408-657-9007" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Relation*</label>
                                        <select type="text" name="g_relation" class="form-control">
                                            <option value="Work Mate">Work Mate</option>
                                            <option value="Relative">Relative</option>
                                            <option value="Close Friend">Close Friend</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Gender*</label>
                                        <select type="text" name="g_gender" class="form-control">
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
                                        <input type="text" name="g2fname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's Last Name*</label>
                                        <input type="text" name="g2lname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's Email Address*</label>
                                        <input type="email" name="g2email" class="form-control" id="emial1" placeholder="example@example.com.com" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's Phone Number*</label>
                                        <input type="text" name="g2phone" class="form-control" placeholder="(+1)408-657-9007" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Relation*</label>
                                        <select type="text" name="g2_relation" class="form-control">
                                            <option value="Work Mate">Work Mate</option>
                                            <option value="Relative">Relative</option>
                                            <option value="Close Friend">Close Friend</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Gender*</label>
                                        <select type="text" name="g2_gender" class="form-control">
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
    <!-- pickdate -->

</div>
