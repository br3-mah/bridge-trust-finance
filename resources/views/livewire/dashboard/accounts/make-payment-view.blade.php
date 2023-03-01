<div class="content-body">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transaction History</h4>
                        @hasanyrole('admin')
                        <button data-bs-toggle="modal" data-bs-target="#makeLoanRepayment" class="btn btn-square btn-primary">Make Loan Repayment</button>
                        {{-- @else --}}
                        {{-- <a class="text-white btn btn-square btn-primary" href="{{ route('apply-for', ['id' => auth()->user()->id]) }}"> New Loan Request</a> --}}
                        @endhasanyrole
                    </div>

                    <div class="card-body pb-0">
                        <div class="table-responsive patient">
                            <table wire:ignore.self wire:poll id="example5" class="display" style="min-width: 845px; position:relative;">
                                <thead>
                                    <tr>
                                        <th>ID.</th>
                                        <th>Ref</th>
                                        <th>Loan</th>
                                        <th>Borrower</th>
                                        <th>Amount Paid</th>
                                        <th>Balance</th>
                                        <th>Processed By</th>
                                    </tr>
                                </thead>
                                <tbody style="top:0; padding-bottom:20px">
                                    
                                    @forelse($transactions as $data)
                                    <tr>
                                        <td style="">{{ $data->id }}</td>
                                        <td style="">{{ $data->ref_no ?? $data->application_id }}</td>
                                        <td style="">{{ $data->application->type }} Loan</td>
                                        <td style="">{{ $data->application->fname.' '.$data->application->lname }}</td>
                                        <td style="">K{{ $data->amount_settled }}</td>
                                        <td style="">K{{ App\Models\Application::payback($data->application->amount, $data->application->repayment_plan) - $data->amount_settled }}</td>
                                        <td>{{ $data->proccess_by ?? '' }}</td>
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
                            <option value="{{ $item->id }}">{{ $item->application->fname.' '.$item->application->lname.' | K'.$item->application->amount.' - '.$item->application->type.' Loan'.' | Duration '.$item->application->repayment_plan}}</option>
                            @empty
                            <option>No Customers Yet</option>
                            @endforelse
                        </select>
                        <div class="input-group">
                            <span class="input-group-text">ZMW</span>
                            <input wire:model.defer="amount" type="text" class="form-control">
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