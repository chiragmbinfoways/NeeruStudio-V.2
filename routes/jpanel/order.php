<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jpanel\Order\OrderController;
Route::group(['middleware' => ['auth']], function () {

    // -------------------- order --------------------------------------------------
    Route::get('/order', [OrderController::class,'index'])->name('list.order');
    Route::get('/products', [OrderController::class,'listProducts'])->name('list.products');
    Route::get('/order/create', [OrderController::class,'createOrder'])->name('create.order');
    Route::post('/order/create', [OrderController::class,'addOrder'])->name('add.order');
    Route::get('/order/fetchDetailsOrder/{id}', [OrderController::class,'fetchDetailsOrder'])->name('fetchDetails.order');
    Route::get('/edit-order/{id}',[OrderController::class,'editOrder'])->name('edit.order');
    Route::get('/image-order/{id}',[OrderController::class,'imageOrder'])->name('image.order');
    Route::post('/add/image-order',[OrderController::class,'addImageOrder'])->name('add.image.order');
    Route::get('/remove/image-order/{id}',[OrderController::class,'imageDelete'])->name('remove.image.order');
    Route::post('/update-order/{id}',[OrderController::class,'updateOrder'])->name('order.update');
    Route::get('/view-order/{id}',[OrderController::class,'viewOrder'])->name('view.order');
    Route::get('/measurement-order/{id}',[OrderController::class,'measurementOrder'])->name('measurement.order');
    Route::post('/measurement/addorder',[OrderController::class,'measurementaddOrder'])->name('measurement.add.order');
    Route::post('/measurement/updateorder',[OrderController::class,'measurementupdateOrder'])->name('measurement.update.order');
    Route::post('/order-status-change',[OrderController::class,'orderStatusChange'])->name('status.change.order');
    Route::post('/order-deliverystatus-change',[OrderController::class,'orderdeliveryStatusChange'])->name('deliverystatus.change.order');
    Route::post('/order-taskstatus-change',[OrderController::class,'ordertaskStatusChange'])->name('taskstatus.change.order');
    Route::post('/item-status-change',[OrderController::class,'itemStatusChange'])->name('measurement.item.change');
    Route::post('/order-delete',[OrderController::class,'orderDelete'])->name('order.delete');
    Route::get('/product-delete/{id}',[OrderController::class,'productDelete'])->name('product.delete');
    Route::post('/measurement-sameblowse',[OrderController::class,'fetchBlowseMeasurement'])->name('blowse.measurement');
});
