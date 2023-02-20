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
                                     <h4 class="number">Loan Rates</h4>
                                     <div class="d-flex align-items-center justify-content-between">
                                        <div class="prim-info">
                                            <span>Active Rate</span>
                                            <h4>0%</h4>
                                        </div>
                                     </div>
                                 </div>
                             </div>
                        </div>
                     <!--/column-->
                      <!--column-->
                        <div class="col-xl-12">
                            @include('livewire.dashboard.__parts.dash-alerts')
                            <div class="card recent-activity">
                                <div class="card-header pb-0 border-0 pt-3">
                                     <h2 class="heading mb-0">Loan Rates</h2>
                                </div>
                                <div class="card-body p-0 pb-3">
                                    @forelse($rates as $rate)
                                        <div class="recent-info">
                                            <div class="recent-content">
                                                    <div class="user-name d-flex">
                                                        @if($rate->type == 'f')
                                                        <span>K</span>
                                                        @endif
                                                        <h6>{{ $rate->value }}</h6>
                                                        @if($rate->type == 'p')
                                                        <span>%</span>
                                                        @endif
                                                        
                                                    </div>
                                            </div>
                                            <div class="count">
                                                <span>{{ $rate->status }}</span>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="recent-info">
                                        <h6>No recent transactions</h6>
                                    </div>
                                    @endempty
                                    <div class="p-4">
                                        <button class="btn btn-primary btn-square" data-bs-toggle="modal" data-bs-target="#loanWalletFundsModal" >Add Loan Rate</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <!--/column-->
                    </div>

                </div>
             <!--/column-->
            </div>
        </div>
    </div>


    <div wire:ignore class="modal fade" id="loanWalletFundsModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Loan Rate </h5>
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
                                        <input class="form-control" wire:model.defer="value" value="{{ old('value') }}" type="text" placeholder="0">
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" wire:model.defer="type">
                                            <option value="p">Percentage</option>
                                            <option value="f">Fixed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>


