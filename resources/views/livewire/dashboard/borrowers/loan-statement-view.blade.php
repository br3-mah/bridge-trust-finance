<div class="content-body">
    <div class="container-fluid">
        <div class="container">
            <h4 class="text-primary">Borrower Loan Statement</h4>
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
            <p>Interest Rate: {{ 20 * $loan->repayment_plan}}%</p>
            <p>Loan Term: {{ $loan->repayment_plan}} Months</p>
          </div>
        </div>
        <table  id="example3" class="display table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Payment Amount</th>
              <th>Principal</th>
              <th>Interest</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>January 1, 2022</td>
              <td>K352.69</td>
              <td>K291.62</td>
              <td>K61.07</td>
              <td>K9,708.38</td>
            </tr>
            <tr>
              <td>February 1, 2022</td>
              <td>K352.69</td>
              <td>K294.64</td>
              <td>K58.05</td>
              <td>K9,413.74</td>
            </tr>
            <!-- more rows here -->
          </tbody>
        </table>
        </div>    
    </div>
</div>
