<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jpanel\Customers\CustomerController;

Route::group(['middleware' => ['auth']], function () {

    // -------------------- Vendor --------------------------------------------------
    Route::get('/customers', [CustomerController::class,'index'])->name('list.customers');
    Route::get('/customers/add',[CustomerController::class,'createCustomers'])->name('create.customers');
    Route::post('/customers/add',[CustomerController::class,'addCustomers'])->name('add.customers');
    Route::get('/edit-customers/{id}',[CustomerController::class,'editCustomers'])->name('edit.customers');
    Route::put('/update-customers/{id}',[CustomerController::class,'updateCustomers'])->name('update.customers');
    Route::get('/view-customers/{id}',[CustomerController::class,'viewCustomers'])->name('view.customers');
    Route::post('/customers-status-change',[CustomerController::class,'customersStatusChange'])->name('status.change.customers');
    Route::post('/customers-delete',[CustomerController::class,'customersDelete'])->name('customers.delete');

});
