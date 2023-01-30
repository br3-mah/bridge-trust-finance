<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\AboutPage;
use App\Http\Livewire\CareerPage;
use App\Http\Livewire\ContactPage;
use App\Http\Livewire\Dashboard\DashboardView;
use App\Http\Livewire\FaqPage;
use App\Http\Livewire\Loans\AssetFinanceLoan;
use App\Http\Livewire\Loans\HomeLoan;
use App\Http\Livewire\Loans\PersonalLoan;
use App\Http\Livewire\Loans\SMELoan;
use App\Http\Livewire\Loans\VehicleLoan;
use App\Http\Livewire\Loans\WIBLoan;
use App\Http\Livewire\ServicePage;
use App\Http\Livewire\TeamPage;
use App\Http\Livewire\WelcomePage;
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
});

Route::resource('posts', PostController::class);


Route::get('faq', FaqPage::class)->name('faq');
Route::get('about-us', AboutPage::class)->name('about.us');
Route::get('our-team', TeamPage::class)->name('about.team');
Route::get('careers', CareerPage::class)->name('about.careers');
Route::get('contact-us', ContactPage::class)->name('contact');
Route::get('services', ServicePage::class)->name('services');


Route::get('personal-loans', PersonalLoan::class)->name('view-personal-loans');
Route::get('educational-loans', PersonalLoan::class)->name('view-educational-loans');
Route::get('asset-finance-loans', AssetFinanceLoan::class)->name('view-asset-loans');
Route::get('home-improvement-loans', HomeLoan::class)->name('view-home-loans');
Route::get('best-sme-loans', SMELoan::class)->name('view-sme-loans');
Route::get('vehicle-loans', VehicleLoan::class)->name('view-vehicle-loans');
Route::get('women-in-business-soft-loans', WIBLoan::class)->name('view-wib-loans');
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');
