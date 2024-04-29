<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PersonController;
use GuzzleHttp\Promise\Create;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('customer/my-name', [CustomerController::class, 'index']);

Route::get('customer/get-city/{param}', [CustomerController::class, 'getCity']);

Route::get('customer/get-student/{param1}/{param2}', [CustomerController::class, 'getStudent']);

Route::get('person/index', [PersonController::class, 'index']);



Route::get('person/create', [PersonController::class, 'create'])->name('person.create');
Route::post('person/store', [PersonController::class, 'store'])->name('person.store');
