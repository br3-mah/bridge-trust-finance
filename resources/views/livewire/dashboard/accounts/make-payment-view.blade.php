<div class="content-body">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transaction History</h4>
                        <button wire:click="exportTransanctions()" title="Export to Excel" class="float-right btn btn-square btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                              </svg>
                        </button> 
                        <button data-bs-toggle="modal" data-bs-target="#makeLoanRepayment" class="btn btn-square btn-primary">Make Loan Repayment</button>
                        
                    </div>

                    <div class="card-body pb-0">
                        <div class="table-responsive patient">
                            <div wire:ignore class="col-xl-12">
                                <div class="alert alert-dark alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                    </button>
                                    <div class="media">
                                        <div class="media-body">
                                            <small class="mb-0">List of payment and repayment transactions. Record loan repayments</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table wire:ignore.self wire:poll id="example5" class="display" style="min-width: 845px; position:relative;">
                                <thead>
                                    <tr>
                                        {{-- <th>ID.</th> --}}
                                        <th>Ref</th>
                                        <th>Loan</th>
                                        <th>Borrower</th>
                                        <th>Collectable</th>
                                        <th>Amount Paid</th>
                                        <th>Balance</th>
                                        <th>Processed By</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody style="top:0; padding-bottom:20px">
                                    
                                    @forelse($transactions as $data)
                                    <tr>
                                        {{-- <td style="">{{ $data->id }}</td> --}}
                                        <td style="text-align:center;">{{ $data->ref_no ?? $data->application_id }}</td>
                                        <td style="text-align:center;">{{ $data->application->type }} Loan</td>
                                        <td style="text-align:center;">{{ $data->application->fname.' '.$data->application->lname }}</td>
                                        <td style="text-align:center;">K{{ $data->amount_settled }}</td>
                                        <td style="text-align:center;">K{{ App\Models\Application::payback($data->application->amount, $data->application->repayment_plan) }}</td>
                                        <td style="text-align:center;">K{{ App\Models\Application::payback($data->application->amount, $data->application->repayment_plan) - $data->amount_settled }}</td>
                                        <td style="text-align:center;">{{ $data->proccess_by ?? '' }}</td>
                                        <td class="d-flex">
                                            <div class="btn sharp tp-btn ms-auto" title="View More Details">
                                                <a target="_blank" href="{{ route('loan-details',['id' => $data->application_id]) }}">  
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore class="modal fade" id="makeLoanRepayment" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form wire:submit.prevent="makepayment()" class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title">Make Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Loan Application</label>
                        <select wire:model.defer="loan_id" class="default-select uppercase form-control wide mb-3" id="exampleInputEmail7" placeholder="Find Customer">
                            @forelse ($loans as $item)
                            <option value="{{ $item->id }}">{{ $item->application->fname.' '.$item->application->lname.' | K'.App\Models\Application::payback($item->application->amount, $item->application->repayment_plan).' - '.$item->application->type.' Loan'.' | Duration '.$item->application->repayment_plan}}</option>
                            @empty
                            <option>No Customers Yet</option>
                            @endforelse
                        </select>
                        <div class="input-group">
                            <span class="input-group-text">ZMW</span>
                            <input wire:model.defer="amount" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Make Payment</button>
                    </div>
                </form>
            </div>
        </div>
</div>