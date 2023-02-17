<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h4 class="card-title">Loan Reports</h4>
            </div>
            <div class="card-body">
                <div class="col-xl-12">
                    <div class="filter cm-content-box box-primary"> 
                        <div class="content-title">
                            <div class="cpa">
                                <i class="fa-sharp fa-solid fa-filter me-2"></i>Filter
                            </div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand SlideToolHeader"><i class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="cm-content-body form excerpt">
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-xl-3">
                                        <input type="text" class="form-control mb-xl-0 mb-3" id="exampleFormControlInput1" placeholder="Title">
                                    </div> --}}
                                    <div wire:ignore class="col-xl-3">
                                        <label>Report Type</label>
                                        <select wire:model="type" class="from-select w-100 mb-xl-0 mb-3" aria-label="Default select example">
                                            <option selected>Select Report Type</option>
                                            <option value="1">Early Settlements Report</option>
                                            <option value="2">Late Settlements Report</option>
                                        </select> 
                                    </div>
                                    <div class="col-xl-3">
                                        <label>Start Date</label>
                                        <input type="date" wire:model="start_date" name="datepicker" class=" form-control mb-xl-0 mb-3">
                                    </div>
                                    <div class="col-xl-3">
                                        <label>End Date</label>
                                        <input type="date" wire:model="end_date" name="datepicker" class=" form-control mb-xl-0 mb-3">
                                    </div>
                                    <div class="col-xl-3">
                                        <button class="btn btn-info" wire:click="searchEarlySettlements()" title="Click here to Search" type="button"><i class="fa fa-search me-1"></i>Filter</button>
                                        {{-- <button class="btn btn-light" title="Click here to remove filter" type="button">Remove Filter</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Results --}}
                <div class="table-responsive">

                    
                    @if(!empty($results))
                        
                        <table id="example5" class="display" style="min-width: 845px; position:relative;">
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
                                
                                @forelse($results as $loan)
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
                                        <div class="btn sharp btn-light tp-btn ms-auto">
                                            <a href="{{ route('loan-details',['id' => $loan->id]) }}">  
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>                                                
                                            </a>
                                        </div>
                                        {{-- @endcan	 --}}

                                        &nbsp;
                                        
                                        @can('accept and reject loan requests')
                                        <div class="dropdown ms-auto text-end">
                                            <div class="dropdown-menu dropdown-menu-start" style="z-index:10; position: fixed;">
                                                <a class="dropdown-item" href="#">Downloand</a>
                                                {{-- <a @disabled(true) disabled class="dropdown-item" href="#">View More Details</a> --}}
                                            </div>
                                            <div class="btn sharp btn-primary tp-btn ms-auto" data-bs-toggle="dropdown">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                <tr style="height: 15vh">
                                
                                </tr>
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
                    @else
                        <p>Search for Range</p>
                    @endif


                    @if (Session::has('attention'))
                    <div class="alert alert-info solid alert-end-icon alert-dismissible fade show">
                        <span><i class="mdi mdi-check"></i></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button> {{ Session::get('attention') }}
                    </div>
                    @elseif (Session::has('error_msg'))
                    <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                        <span><i class="mdi mdi-help"></i></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                        <strong>Error!</strong> {{ Session::get('error_msg') }}
                    </div
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>
