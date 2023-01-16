<?php

use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth']], function () {

    // -------------------- Vendor --------------------------------------------------
    Route::get('/vendors', 'App\Http\Controllers\Jpanel\Vendor\VendorDetailController@index')->name('list.vendors');
    Route::get('/vendors/add', 'App\Http\Controllers\Jpanel\Vendor\VendorDetailController@createVendor')->name('create.vendors');
    Route::post('/vendors/add', 'App\Http\Controllers\Jpanel\Vendor\VendorDetailController@addVendor')->name('add.vendor');
    Route::get('/edit-vendor/{id}', 'App\Http\Controllers\Jpanel\Vendor\VendorDetailController@editVendor')->name('edit.vendor');
    Route::put('/update-vendor/{id}', 'App\Http\Controllers\Jpanel\Vendor\VendorDetailController@updateVendor')->name('update.vendor');
    Route::get('/view-vendor/{id}', 'App\Http\Controllers\Jpanel\Vendor\VendorDetailController@viewVendor')->name('view.vendor');
    Route::post('/vendor-status-change', 'App\Http\Controllers\Jpanel\Vendor\VendorDetailController@vendorStatusChange')->name('status.change.vendor');
    Route::post('/vendor-delete', 'App\Http\Controllers\Jpanel\Vendor\VendorDetailController@vendorDelete')->name('vendor.delete');

});
