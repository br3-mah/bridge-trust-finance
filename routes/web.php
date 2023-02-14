<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\AboutPage;
use App\Http\Livewire\CareerPage;
use App\Http\Livewire\ContactPage;
use App\Http\Livewire\Dashboard\Accounting\LoanStatementView;
use App\Http\Livewire\Dashboard\Accounts\AccountView;
use App\Http\Livewire\Dashboard\Borrowers\BorrowerView;
use App\Http\Livewire\Dashboard\Borrowers\SendBorrowerMessageView;
use App\Http\Livewire\Dashboard\DashboardView;
use App\Http\Livewire\Dashboard\Employees\EmployeesView;
use App\Http\Livewire\Dashboard\Loans\GuarantorsView;
use App\Http\Livewire\Dashboard\Loans\LoanDetailView;
use App\Http\Livewire\Dashboard\Loans\LoanHistoryView;
use App\Http\Livewire\Dashboard\Loans\LoanRatesView;
use App\Http\Livewire\Dashboard\Loans\LoanRepaymentCalculatorView;
use App\Http\Livewire\Dashboard\Loans\LoanRequestView;
use App\Http\Livewire\Dashboard\Loans\MissedRepaymentsView;
use App\Http\Livewire\Dashboard\Loans\PastMaturityDateView;
use App\Http\Livewire\Dashboard\NotificationView;
use App\Http\Livewire\Dashboard\Settings\LoanWalletView;
use App\Http\Livewire\Dashboard\Settings\UserRolesView;
use App\Http\Livewire\Dashboard\Settings\UserView;
use App\Http\Livewire\FaqPage;
use App\Http\Livewire\Loans\AssetFinanceLoan;
use App\Http\Livewire\Loans\EducationalLoan;
use App\Http\Livewire\Loans\HomeLoan;
use App\Http\Livewire\Loans\PersonalLoan;
use App\Http\Livewire\Loans\SMELoan;
use App\Http\Livewire\Loans\VehicleLoan;
use App\Http\Livewire\Loans\WIBLoan;
use App\Http\Livewire\ReportView;
use App\Http\Livewire\ServicePage;
use App\Http\Livewire\SuccessEmailPage;
use App\Http\Livewire\SuccessPage;
use App\Http\Livewire\TeamPage;
use App\Http\Livewire\WelcomePage;
use App\Models\LoanWallet;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomePage::class)->name('welcome');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', DashboardView::class)->name('dashboard');
    // Administrator
    Route::get('client-loan-requests', LoanRequestView::class)->name('view-loan-requests');
    Route::get('client-loan-history', LoanHistoryView::class)->name('view-loan-history');
    Route::get('loan-rates', LoanRatesView::class)->name('view-loan-rates');
    Route::get('repayment-calculator', LoanRepaymentCalculatorView::class)->name('view-repayment-calculator');

    // ---- Borrowers
    Route::get('borrowers', BorrowerView::class)->name('borrowers');
    Route::get('send-messages-to-borrowers', SendBorrowerMessageView::class)->name('notify-borrowers');

    // ---- loans
    Route::get('loan-details', LoanDetailView::class)->name('loan-details');
    Route::get('past-maturity-date', PastMaturityDateView::class)->name('past-maturity-date');
    Route::get('guarantors', GuarantorsView::class)->name('guarantors');
    Route::get('missed-repayments', MissedRepaymentsView::class)->name('missed-repayments');

    // ---- Employees
    Route::get('view-employees', EmployeesView::class)->name('employees');

    // ---- Accounts
    Route::get('client-account', AccountView::class)->name('client-account');
    Route::get('loan-statement', LoanStatementView::class)->name('loan-statement');
    Route::get('loan-wallet-account', LoanWalletView::class)->name('loan-wallet');

    // ----- Reports
    Route::get('reports/loan-report', ReportView::class)->name('loan-report');
    Route::get('reports/borrower-report', ReportView::class)->name('borrower-report');

    // ----- settings
    Route::get('users', UserView::class)->name('users');
    Route::post('/create-user', [UserController::class, 'store'])->name('create-user');
    Route::get('notifications', NotificationView::class)->name('notifications');
    Route::get('user-roles-and-permissions', UserRolesView::class)->name('roles');
});

Route::resource('posts', PostController::class);

// Site Pages
Route::get('faq', FaqPage::class)->name('faq');
Route::get('about-us', AboutPage::class)->name('about.us');
Route::get('our-team', TeamPage::class)->name('about.team');
Route::get('careers', CareerPage::class)->name('about.careers');
Route::get('contact-us', ContactPage::class)->name('contact');
Route::get('services', ServicePage::class)->name('services');
Route::post('request-for-loan', [LoanApplicationController::class, 'store'])->name('loan-request');
Route::get('get-application', [LoanApplicationController::class, 'getLoan'])->name('get-application');
Route::get('update-existing-application', [LoanApplicationController::class, 'updateExistingLoan'])->name('update-existing-application');

// Site Services Pages
Route::get('personal-loans', PersonalLoan::class)->name('view-personal-loans');
Route::get('educational-loans', EducationalLoan::class)->name('view-educational-loans');
Route::get('asset-finance-loans', AssetFinanceLoan::class)->name('view-asset-loans');
Route::get('home-improvement-loans', HomeLoan::class)->name('view-home-loans');
Route::get('best-sme-loans', SMELoan::class)->name('view-sme-loans');
Route::get('vehicle-loans', VehicleLoan::class)->name('view-vehicle-loans');
Route::get('women-in-business-soft-loans', WIBLoan::class)->name('view-wib-loans');
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

// Alerts and Notifications
Route::get('successfully-applied-a-loan', SuccessPage::class)->name('success-application');
Route::get('email-sent-successfully', SuccessEmailPage::class)->name('success-email');
