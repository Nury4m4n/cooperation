<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('customer/create',[CustomerController::class, 'create'])->name('customer.create');

Route::post('customer/store',[CustomerController::class, 'store'])->name('customer.store');