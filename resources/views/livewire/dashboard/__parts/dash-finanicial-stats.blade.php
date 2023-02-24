<div class="card dz-wallet">
    <div class="card-header border-0 align-items-start pb-0">
        <div>
            @role('admin')
                <span class="fs-18 d-block mb-2">Total Loans</span>
                <h2 class="fs-28 font-w600 ">K {{  App\Models\Application::totalAmountLoanedOut() }}</h2>
            @else
                <span class="fs-18 d-block mb-2">
                    Total Customer Borrowed
                </span>
                <h2 class="fs-28 font-w600 ">K {{ App\Models\User::totalCustomerBorrowed(auth()->user()) }}</h2>
            @endrole
        </div>
        {{-- <div class="dropdown send style-1">
            <a href="javascript:void(0);" class="btn-link btn sharp tp-btn-light btn-primary pill" data-bs-toggle="dropdown" aria-expanded="false">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.47908 4.58333C8.47908 3.19 9.60659 2.0625 10.9999 2.0625C12.3933 2.0625 13.5208 3.19 13.5208 4.58333C13.5208 5.97667 12.3933 7.10417 10.9999 7.10417C9.60658 7.10417 8.47908 5.97667 8.47908 4.58333ZM12.1458 4.58333C12.1458 3.95083 11.6324 3.4375 10.9999 3.4375C10.3674 3.4375 9.85408 3.95083 9.85408 4.58333C9.85408 5.21583 10.3674 5.72917 10.9999 5.72917C11.6324 5.72917 12.1458 5.21583 12.1458 4.58333Z" fill="#fff" />
                    <path d="M8.47908 17.4163C8.47908 16.023 9.60659 14.8955 10.9999 14.8955C12.3933 14.8955 13.5208 16.023 13.5208 17.4163C13.5208 18.8097 12.3933 19.9372 10.9999 19.9372C9.60658 19.9372 8.47908 18.8097 8.47908 17.4163ZM12.1458 17.4163C12.1458 16.7838 11.6324 16.2705 10.9999 16.2705C10.3674 16.2705 9.85408 16.7838 9.85408 17.4163C9.85408 18.0488 10.3674 18.5622 10.9999 18.5622C11.6324 18.5622 12.1458 18.0488 12.1458 17.4163Z" fill="#fff" />
                    <path d="M8.47908 11.0003C8.47908 9.60699 9.60659 8.47949 10.9999 8.47949C12.3933 8.47949 13.5208 9.60699 13.5208 11.0003C13.5208 12.3937 12.3933 13.5212 10.9999 13.5212C9.60658 13.5212 8.47908 12.3937 8.47908 11.0003ZM12.1458 11.0003C12.1458 10.3678 11.6324 9.85449 10.9999 9.85449C10.3674 9.85449 9.85408 10.3678 9.85408 11.0003C9.85408 11.6328 10.3674 12.1462 10.9999 12.1462C11.6324 12.1462 12.1458 11.6328 12.1458 11.0003Z" fill="#fff" />
                </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                <a class="dropdown-item" href="javascript:void(0);">Edit</a>
            </div>
        </div> --}}
    </div>
    <div class="card-body py-4 pt-md-2">
        <div class="progress default-progress mb-3">
            <hr>
            {{-- <div class="progress-bar bg-vigit progress-animated" style="width: 80%; height:8px;" role="progressbar">
                <span class="sr-only">1% Complete</span>
            </div> --}}
        </div>
        
        <div wire:poll class="row mt-1">
            @can('view company financial statistics')
            {{-- <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">TOTAL LOANS</p>
                <h4 class="mb-0 font-w500 text-white">{{ App\Models\Application::totalLoans() }}</h4>
            </div> --}}
            <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">APPROVED LOANS</p>
                <h4 class="mb-0 font-w500 text-white">{{ App\Models\Application::totalApprovedLoans() }}</h4>
            </div>
            <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">PENDING APPROVAL</p>
                <h4 class="mb-0 font-w500 text-white">{{ App\Models\Application::totalPendingLoans() }}</h4>
            </div>
            <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">TOTAL REPAYMENTS</p>
                <h4 class="mb-0 font-w500 text-white">0</h4>
            </div>
            <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">TOTAL CUSTOMERS</p>
                <h4 class="mb-0 font-w500 text-white">{{ App\Models\User::totalBorrowers() }}</h4>
            </div>
            {{-- <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">TOTAL LOANS </p>
                <h4 class="mb-0 font-w500 text-white">K {{ App\Models\Application::totalAmountLoans() }}</h4>
            </div> --}}
            <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">TOTAL LOANED OUT AMOUNT </p>
                <h4 class="mb-0 font-w500 text-white">K {{ App\Models\Application::totalAmountLoanedOut() }}</h4>
            </div>
            <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">PENDING BORROWED AMOUNT</p>
                <h4 class="mb-0 font-w500 text-white">K {{ App\Models\Application::totalAmountPending() }}</h4>
            </div>
            <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">TOTAL COLLECTED AMOUNT</p>
                <h4 class="mb-0 font-w500 text-white">K 0</h4>
            </div>
            <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">TOTAL INCOMPLETE KYC</p>
                <h4 class="mb-0 font-w500 text-white">{{ App\Models\User::totalIncompleteKYCBorrowers() }}</h4>
            </div>
            @endcan
            {{-- <div class="value-data col-xl-3 col-md-4 col-6">
                <p class="mb-1">EXPECTED (Profit)</p>
                <h4 class="mb-0 text-white font-w500">K 0</h4>
            </div>
            <div class="value-data col-xl-4 col-md-4 col-12">
                <p class="mb-1">EXPECTED (Loss)</p>
                <h4 class="mb-0 text-white font-w500">K 0</h4>
            </div> --}}
            <div class="col-xl-2"></div>

        </div>
    </div>
</div>