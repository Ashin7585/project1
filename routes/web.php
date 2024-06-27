<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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
    return view('home');
});

//Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customer-form', [CustomerController::class, 'showForm'])->name('customer.form');
Route::post('/submit-form', [CustomerController::class, 'submitForm'])->name('customer.submit');
Route::get('/customers', [CustomerController::class,'showCustomers'])->name('customers.list');
Route::get('/customers/edit/{id}', [CustomerController::class, 'editCustomer'])->name('customers.edit');
Route::put('/customers/update/{id}', [CustomerController::class, 'updateCustomer'])->name('customers.update');
Route::delete('/customers/delete/{id}', [CustomerController::class, 'deleteCustomer'])->name('customers.delete');


