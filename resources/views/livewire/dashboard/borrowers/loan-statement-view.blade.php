<div class="content-body">
    <div class="container-fluid">
        <div class="container">
            <h2 class="text-primary">Loan Statement</h2>
        <div class="row">
          <div class="col-md-6">
            <h6>Borrower Information</h6>
            <p>Name: {{  $loan->fname.' '.$loan->lname }}</p>
            <p>Address: {{ $loan->address ?? '' }}</p>
            <p>Phone: {{ $loan->phone ?? '' }}</p>
          </div>
          <div class="col-md-6">
            <h6>Loan Information</h6>
            <p>Loan Amount: K{{ $loan->amount }}</p>
            <p>Payback Amount: K{{ App\Models\Application::payback($loan->amount, $loan->repayment_plan)  }}</p>
            <p>Interest Rate: {{ 20 * $loan->repayment_plan}}%</p>
            <p>Loan Term: {{ $loan->repayment_plan}} Months</p>
          </div>
        </div>
        @if(!empty($transactions->toArray()))
        <table  id="example3" class="display table">
          <thead class="bg-primary">
            <tr>
              <th>Date</th>
              <th>Payment Amount</th>
              <th>Principal</th>
              <th>Interest</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody>
            @forelse($transactions as $data)
            <tr>
              <td>&nbsp;{{ $data->created_at->toFormattedDateString() }}</td>
              <td>&nbsp;K{{ $data->amount_settled }}</td>
              <td>&nbsp;K{{ $loan->amount }}</td>
              <td>&nbsp;{{ 20 * $loan->repayment_plan}}%</td>
              <td>&nbsp;K{{ App\Models\Application::payback($loan->amount, $loan->repayment_plan) - $data->amount_settled }}</td>
            </tr>
            @empty
            <div>No Payments Recorded</div>
            @endforelse
          </tbody>
        </table>
        @else
        <div>No Payments Recorded</div>
        @endif
        </div>    
    </div>
</div>
