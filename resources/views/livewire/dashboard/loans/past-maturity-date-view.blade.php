<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Past Maturity Date</h4>
                        <button wire:click="exportPMLoans()" title="Export to Excel" class="btn btn-square btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                              </svg>
                        </button>
                    </div>
                    <div class="card-body pb-0" style="padding-bottom: 30%">
                        <div class="table-responsive patient">
                            <div wire:ignore class="col-xl-12">
                                <div class="alert alert-dark alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                    </button>
                                    <div class="media">
                                        <div class="media-body">
                                            <small class="mb-0">List of loan which have past their final due date.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div wire:ignore class="row py-2">
                                @can('accept and reject loan requests')
                                {{-- <div class="col-xl-3 center">
                                    <select multiple wire:model.lazy="type" class="default-select form-control wide mt-3" aria-placeholder="Loan" placeholder="Loan Types">
                                        <option value="Personal">Personal</option>
                                        <option value="Education">Education</option>
                                        <option value="Asset Financing">Asset Financing</option>
                                        <option value="Home Improvement">Home Improvements</option>
                                        <option value="Agri Business">Agri Business</option>
                                        <option value="Women in Business (Femiprise) Soft">Women in Business</option>
                                    </select>
                                </div> --}}
                                @endcan
                            </div>
                            <table wire:ignore.self wire:poll id="example5" class="display" style="min-width: 845px; position:relative;">
                                <thead>
                                    <tr>
                                        <th>Loan #.</th>
                                        <th>Borrower</th>
                                        <th>Loan Type</th>
                                        <th>Principal</th>
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
                                        <td style="">#{{ $loan->application->id }}</td>
                                        <td style="">{{ $loan->application->fname.' '. $loan->application->lname }}</td>
                                        <td style="">{{ $loan->application->type }}</td>
                                        <td style="">{{ $loan->application->amount }}</td>
                                        <td style="">{{ App\Models\Application::payback($loan->application->amount, $loan->application->repayment_plan) }}</td>
                                        <td style="">{{ App\Models\Loans::loan_settled($loan->application->id) }}</td>
                                        <td style="">
                                        {{ 
                                            App\Models\Application::payback($loan->application->amount, $loan->application->repayment_plan) - App\Models\Loans::loan_balance($loan->application->id)
                                        }}
                                        </td>
                                        <td>--</td>
                                        <td>
                                            @if($loan->application->status == 0)
                                            <span class="badge badge-sm light badge-danger">
                                                <i class="fa fa-circle text-danger me-1"></i>
                                                Pending
                                            </span>
                                            @elseif($loan->application->status == 1)
                                            <span class="badge badge-sm light badge-success">
                                                <i class="fa fa-circle text-success me-1"></i>
                                                Not Paid
                                            </span>
                                            @elseif($loan->application->status == 2)
                                            <span class="badge badge-sm light badge-warning">
                                                <i class="fa fa-circle text-warning me-1"></i>
                                                Under Review
                                            </span>
                                            @else
                                            <span class="badge badge-sm light badge-default">
                                                <i class="fa fa-circle text-warning me-1"></i>
                                                Reversed
                                            </span>
                                            @endif
                                        </td>
                                        <td style="">{{ $loan->application->created_at->toFormattedDateString() }}</td>
                                        <td class="d-flex">
                                            <div class="btn sharp btn-primary tp-btn ms-auto">
                                                <a href="{{ route('loan-details',['id' => $loan->application->id]) }}">  
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                    </svg>                                                
                                                </a>
                                            </div>
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
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
