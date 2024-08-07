<?php

use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminMandatorySavingController;
use App\Http\Controllers\AdminMyLoanController;
use App\Http\Controllers\AdminMySavingController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MandatorySavingController;
use App\Http\Controllers\MyLoanController;
use App\Http\Controllers\MySavingController;
use App\Http\Controllers\RegisterController;
use App\Models\MyLoan;
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



// Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
// Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
// Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
// Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index')->middleware('auth');
// Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
// Route::put('/customer/update', [CustomerController::class, 'update'])->name('customer.update');
// Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

// Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');


// Route::resource('/login', LoginController::class);


Route::get('/', function () {
    return view('welcome');
})->name('welcome.home')->middleware('guest');

Route::get('/customer/home', function () {
    return view('layout.dashboard');
})->name('customer.home')->middleware('auth');

Route::resource('/register', RegisterController::class);

Route::resource('/customer', CustomerController::class)->middleware('auth');

Route::resource('/mandatory-saving', MandatorySavingController::class)->middleware('auth');

Route::post('/login/authenticated', [LoginController::class, 'authenticated'])->name('login.authenticated');

Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::resource('/my-saving', MySavingController::class)->middleware('auth');

Route::resource('admin-my-saving', AdminMySavingController::class)->middleware('admin');

Route::resource('admin-mandatory-saving', AdminMandatorySavingController::class)->middleware('admin');

Route::resource('/admin-customer', AdminCustomerController::class)->middleware('admin');

Route::resource('/admin-role', AdminRoleController::class)->middleware('admin');

Route::resource('/my-loan', MyLoanController::class)->middleware('auth');

Route::get('/admin/my-loan', [AdminMyLoanController::class, 'index'])->name('admin-my-loans.index')->middleware('admin');
Route::post('/admin/my-loan/{myLoan}/approve', [AdminMyLoanController::class, 'approve'])->name('admin-my-loans.approve')->middleware('admin');
Route::post('/admin/my-loan/{myLoan}/reject', [AdminMyLoanController::class, 'reject'])->name('admin-my-loans.reject')->middleware('admin');
Route::delete('/admin/my-loan/{myLoan}', [AdminMyLoanController::class, 'destroy'])->name('admin-my-loans.destroy')->middleware('admin');
Route::post('/admin-my-loans/pay/{id}', [AdminMyLoanController::class, 'pay'])->name('admin-my-loans.pay');
Route::get('/admin/my-loan/show/{id}', [AdminMyLoanController::class, 'show'])->name('admin-my-loans.show')->middleware('admin');
