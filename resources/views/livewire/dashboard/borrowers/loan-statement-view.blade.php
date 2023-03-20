<div class="content-body">
  <div class="container-fluid">
    <button onclick="printStatement()" class="btn btn-square btn-warning">Print PDF</button>
    <button wire:click='exportLoanStatement()' class="btn btn-square btn-success">Export to Excel</button>
    <div id="statementtoPrint" class="bg-white container" style="
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    padding:2%;
    border-top: 2px solid 
    ">
      
      <h2 class="text-primary">Loan Statement</h2>
        <div class="row">
          <div class="col-md-6">
            <h6>Borrower Information</h6>
            <p>Name: {{  $loan->fname.' '.$loan->lname }}</p>
            <p>Address: {{ $loan->address ?? $loan->user->address }}</p>
            <p>NRC: {{ $loan->nrc_no ?? $loan->user->nrc_no }}</p>
            <p>Phone: {{ $loan->phone ?? $loan->user->phone }}</p>
          </div>
          <div class="col-md-6">
            <h6>Loan Information</h6>
            <p>Loan Amount: K{{ $loan->amount }}</p>
            <p>Payback Amount: K{{ App\Models\Application::payback($loan->amount, $loan->repayment_plan)  }}</p>
            <p>Total Balance: K{{ App\Models\Loans::loan_balance($loans->id) }}</p>
            <p>Interest Rate: 
              @if($loan->repayment_plan > 1)
              44%
              @else
              20%
              @endif
            </p>
            <p>Loan Term: {{ $loan->repayment_plan}} Months</p>
          </div>
        </div>
        @if(!empty($transactions->toArray()))
        <table  id="example3" class="display table">
          <thead class="bg-primary">
            <tr>
              <th>Date</th>
              <th>Payment Amount</th>
              <th>Loan Amount</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<!-- html2canvas library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<script>
  function printStatement(){
    // Get the HTML element that you want to convert to PDF
    const element = document.getElementById('statementtoPrint');

    // Create a new jsPDF instance
    const doc = new jsPDF();
    var name = "{{ $loan->fname.' '.$loan->lname }}";
    // Use the html2canvas library to render the element as a canvas
    html2canvas(element).then(canvas => {
      // Convert the canvas to an image data URL
      const imgData = canvas.toDataURL('image/png');

      // Add the image data URL to the PDF document
      doc.addImage(imgData, 'PNG', 10, 10);

      // Save the PDF document
      doc.save(name+' Loan Statement.pdf');
    });
  }
</script>