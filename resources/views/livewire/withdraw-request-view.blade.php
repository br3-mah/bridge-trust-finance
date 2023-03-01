<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Withdraw Requests</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-striped table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Withdraw Code</th>
                                    <th>Mobile Money</th>
                                    <th>Card</th>
                                    <th>Date Sent</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requests as $req)
                                <tr>
                                    <th>{{$req->id }}</th>
                                    <td>{{ $req->user->fname.' '.$req->user->lname }}</td>
                                    <td>{{ $req->mobile_number ?? ''}}</td>
                                    <td>{{ $req->card_number ?? ''}}</td>
                                    <td><span class="badge badge-primary">{{ $req->ref ?? 'invalid' }}</span>
                                    </td>
                                    <td>{{ $req->created_at->toFormattedDateString() }}</td>
                                    <td class="color-primary">K {{ $req->amount }}</td>
                                    <td class="d-flex">
                                        <button class="btn btn-primary btn-square" wire:click='acceptTransaction({{$req->id}})'>
                                            Accept
                                        </button>
                                        {{-- <button wire:click='denyTransaction({{$req->id}})'>
                                            Reject
                                        </button> --}}
                                    </td>
                                </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
