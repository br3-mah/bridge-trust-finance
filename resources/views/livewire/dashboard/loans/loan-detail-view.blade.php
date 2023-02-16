<div class="content-body">
    {{-- <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hold Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to hold this loan application under review?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline btn-square primary btn-sm" data-bs-dismiss="modal">No</button>
                    <button type="button" wire:click="stall({{$loan->id}})" class="btn btn-primary btn-square btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Accept Loan Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to approve and accept this loan application?
                    <br>
                    <br>
                    <b>Note:</b> Funds will be transfered immediately to the borrower's wallet account.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline btn-square primary btn-sm" data-bs-dismiss="modal">No</button>
                    <button type="button" wire:click="accept()" class="btn btn-primary btn-square btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade bd-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Accept Loan Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to disapprove and reject this loan application?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline btn-square primary btn-sm" data-bs-dismiss="modal">No</button>
                    <button type="button" wire:click="reject({{$loan->id}})" class="btn btn-primary btn-square btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid mh-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $loan->type }} Loan | K{{ $loan->amount ?? 0 }}</h4>

                        <div class="d-flex align-items-end flex-wrap">
                            @if($loan->status != 1)
                            <div class="shopping-cart mb-2 me-3">
                                <button 
                                    class="btn btn-square btn-outline-primary" 
                                    {{-- wire:click.prevent="confirm({{ $loan->id }}, 'stall')"  --}}
                                    wire:click.prevent="stall({{ $loan->id }})" 
                                    data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm"
                                    onclick="confirm('Are you sure you want to hold this loan application for review?') || event.stopImmediatePropagation();"
                                >
                                <i class="fa fa-pause me-2"></i>Hold Loan
                                </button>
                            </div>
                            <div class="shopping-cart mb-2 me-3">
                                <button 
                                    class="btn btn-square btn-primary" 
                                    wire:click.prevent="accept({{ $loan->id }})" 
                                    {{-- data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1" --}}
                                    onclick="confirm('Are you sure you want to approve and accept this loan application') || event.stopImmediatePropagation();"
                                >
                                <i class="fa fa-check me-2"></i>Accept Loan
                                </button>
                            </div>
                            <div class="shopping-cart mb-2 me-3">
                                <button 
                                    class="btn btn-square btn-outline-danger" 
                                    wire:click.prevent="reject({{ $loan->id }})" 
                                    {{-- data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2" --}}
                                    onclick="confirm('Are you sure you want to disapprove and reject this loan application?') || event.stopImmediatePropagation();"
                                >
                                <i class="fa fa-cancel me-2"></i>Reject Loan
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-xl-6 col-lg-6 col-md-6 col-xxl-6 col-sm-12">
                                <div class="product-detail-content">
                                    <div class="new-arrival-content pr">
                                        <p>Borrower: <span class="item">{{ $loan->fname ?? $loan->user->fname }} {{ $loan->lname ?? $loan->user->lname }}</span> </p>
                                        <p>Address: <span class="item">{{ $loan->address ?? $loan->user->address }}</span></p>
                                        <p>Phone No.: <span class="item">{{ $loan->phone ?? $loan->user->phone }}</span></p>
                                        <p>Sex: <span class="item">{{ $loan->gender ?? $loan->user->gender }}</span></p>
                                    </div>
                                </div>
                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-xxl-6 col-sm-12">
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="new-arrival-content pr">
                                        {{-- <div class="d-table mb-2"> --}}
                                            <p class="price float-start d-block"></p>
                                        </div>
                                        <p>
                                            Borrowed Amount: 
                                            <span class="item">
                                                K{{ $loan->amount ?? 0 }}
                                            </span>
                                        </p>
                                        <p>Duration: <span class="item">{{ $loan->repayment_plan }} Months</span> </p>
                                        <p>Interest: <span class="item">{{ $loan->interest }}% p.m</span></p>

                                        {{-- Payback details --}}
                                        @if($loan->status == 1 || preg_replace('/[^A-Za-z0-9. -]/', '',  Auth::user()->roles->pluck('name')) == 'admin')
                                        <p>Payback Amount: <span class="item">K {{ App\Models\Application::payback($loan->amount, preg_replace('/[^0-9]/','', $loan->repayment_plan)) }}</span></p>
                                        <p>Total Interest Rate: <span class="item">{{ $loan->repayment_plan * 20 }}%</span></p>
                                        @endif
                                        {{-- Loan Status --}}
                                        <p>Loan Progress:&nbsp;&nbsp;
                                            @if ($loan->status == 0)
                                                @if($loan->complete == 0)
                                                <span class="badge badge-dark">Incomplete KYC</span>
                                                @else
                                                <span class="badge badge-success">Pending</span>
                                                @endif
                                            @else
                                                @if($loan->complete == 0)
                                                <span class="badge badge-light">Incomplete KYC</span>
                                                @else
                                                <span class="badge badge-light">Pending</span>
                                                @endif
                                            @endif
                                            @if ($loan->status == 2)
                                            <span class="badge badge-success">Under Review</span>
                                            @else
                                            <span class="badge badge-light">Under Review</span>
                                            @endif
                                            @if ($loan->status == 1)
                                            <span class="badge badge-success">Accepted</span>
                                            @else
                                            <span class="badge badge-light">Accepted</span>
                                            @endif
                                            @if ($loan->status == 3)
                                            <span class="badge badge-success">Rejected</span>
                                            @else
                                            <span class="badge badge-light">Rejected</span>
                                            @endif
                                            
                                        </p>
                                        <p class="text-content">
                                            
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="title-sm">
                                <h5>Guarantors</h5>
                            </div>
                            <div class="col-lg-6 col-xl-6 col-xxl-6 col-sm-12">
                                <p>1st Garantors Name: <span class="item">{{ $loan->gfname.' '.$loan->glname }}</span></p>
                                <p>1st Garantors Phone No.: <span class="item">{{ $loan->gphone }}</span></p>
                                <p>1st Garantors Email: <span class="item">{{ $loan->gemail }}</span></p>
                                <p>1st Garantors Sex: <span class="item">{{ $loan->g_gender }}</span></p>
                                <p>1st Garantors Relation: <span class="item">{{ $loan->g_relation }}</span></p>
                            </div>
                            <div class="col-lg-6 col-xl-6 col-xxl-6 col-sm-12">
                                <p>2nd Garantors Name: <span class="item">{{ $loan->g2fname.' '.$loan->g2lname }}</span></p>
                                <p>2nd Garantors Phone No.: <span class="item">{{ $loan->g2phone }}</span></p>
                                <p>2nd Garantors Email: <span class="item">{{ $loan->g2email }}</span></p>
                                <p>2nd Garantors Sex: <span class="item">{{ $loan->g2_gender }}</span></p>
                                <p>2nd Garantors Relation: <span class="item">{{ $loan->g_2relation }}</span></p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- review -->
            <div class="modal fade" id="reviewModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Review</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="text-center mb-4">
                                    <img class="img-fluid rounded" width="78" src="images/avatar/1.jpg" alt="DexignZone">
                                </div>
                                <div class="mb-3">
                                    <div class="rating-widget mb-4 text-center">
                                        <!-- Rating Stars Box -->
                                        <div class="rating-stars">
                                            <ul id="stars">
                                                <li class="star" title="Poor" data-value="1">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Fair" data-value="2">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Good" data-value="3">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Excellent" data-value="4">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="WOW!!!" data-value="5">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" placeholder="Comment" rows="5"></textarea>
                                </div>
                                <button class="btn btn-success btn-block">RATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    
</div>

