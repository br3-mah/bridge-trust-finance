<div wire:poll class="content-body">
    <div class="container-fluid">
        <div class="bg-white shadow rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
              <h3 class="text-lg font-bold text-gray-700">Loan Eligibility Score</h3>
            </div>
            <div class="mb-6">
              <p class="text-gray-600 mb-2">Based on your credit score, income, and debt-to-income ratio, you are eligible for a loan of up to:</p>
              <h2 class="text-3xl font-bold text-indigo-600">K50,000</h2>
            </div>
            <ul class="divide-y divide-gray-200">
              <li class="py-2 flex justify-between items-center">
                <span class="font-medium text-gray-700">Credit Score</span>
                <span class="px-3 py-1 bg-indigo-600 text-primary rounded-md">750</span>
              </li>
              <li class="py-2 flex justify-between items-center">
                <span class="font-medium text-gray-700">Monthly Income</span>
                <span class="px-3 py-1 bg-indigo-600 text-primary rounded-md">K5,000</span>
              </li>
              <li class="py-2 flex justify-between items-center">
                <span class="font-medium text-gray-700">Debt-to-Income Ratio</span>
                <span class="px-3 py-1 bg-indigo-600 text-primary rounded-md">25%</span>
              </li>
            </ul>
            <div class="mt-6">
                <div>
                    <div class="col-xl-6">
                        <div class="alert alert-success left-icon-big alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                            </button>
                            <div class="media">
                                <div class="alert-left-icon-big">
                                    <span><i class="mdi mdi-check-circle-outline"></i></span>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-1 mb-2">ELIGIBLE!</h5>
                                    <p class="mb-0">Borrow is eligibilible for Personal Loan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-6">
                        <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                            </button>
                            <div class="media">
                                <div class="alert-left-icon-big">
                                    <span><i class="mdi mdi-alert"></i></span>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-1 mb-2">NOT ELIGIBLE!</h5>
                                    <p class="mb-0">Borrow is NOT eligibilible at the moment due to circumstances.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
              {{-- <a href="#" class="btn btn-square btn-sm btn-primary block w-full bg-indigo-600 hover:bg-indigo-700 font-semibold py-2 px-4">Apply Now</a> --}}
            </div>
        </div>
    </div>    
</div>
