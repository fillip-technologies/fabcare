<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\LaundryItemController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WeightBillController;
use App\Http\Controllers\Setting\LaundryPriceController;
use App\Http\Controllers\Setting\LaundryTypeController;
use App\Http\Controllers\Setting\WeightRangeController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminController::class, 'login_admin'])->name('admin');
Route::post('login', [LoginController::class, 'login'])->name('admin.login');
Route::get('admin/store', [LoginController::class, 'store'])->name('login.store');

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Route::get('item/index', [LaundryItemController::class, 'ItemIndex'])->name('items.index');
    // Route::get('item/list', [LaundryItemController::class, 'ItemList'])->name('item.list');
    // Route::post('item/create', [LaundryItemController::class, 'ItemCreate'])->name('item.save');
    // Route::get('item/{id}/edit', [LaundryItemController::class, 'ItemEdit'])->name('items.edit');
    // Route::post('item/{id}/update', [LaundryItemController::class, 'ItemUpdate'])->name('item.update');
    // Route::delete('item/{id}/delete', [LaundryItemController::class, 'ItemDelete'])->name('item.delete');
    // Route::get('/export/item', [LaundryItemController::class, 'itemexport'])->name('export.items');

    Route::get('user/index', [UserController::class, 'index'])->name('user.index');
    Route::post('user/create', [UserController::class, 'create'])->name('user.save');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('user/{id}/delete', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/weight/bill/form', [WeightBillController::class, 'create'])->name('weight.bill.form');
    Route::post('/store/weight/bill', [WeightBillController::class, 'store'])->name('store.weight.bill');
    Route::get('weight/list/bill', [WeightBillController::class, 'list'])->name('weight.bill.list');
    Route::get('weight/bill/alldata', [WeightBillController::class, 'alldata'])->name('weight.bill.alldata');

    Route::post('/import/items', [LaundryItemController::class, 'itemImport'])->name('import.items');
    Route::get('/items/search', [LaundryItemController::class, 'item_search'])->name('items.search');

    Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::post('password/update', [LoginController::class, 'update'])->name('password.updated');
    Route::get('update/password', [LoginController::class, 'update_password'])->name('update.password');

    Route::get('/billing/form', [BillingController::class, 'billform'])->name('billing.from');
    Route::get('/billing/list', [BillingController::class, 'billlist'])->name('billing.list');
    Route::post('/billing/store', [BillingController::class, 'billcreate'])->name('billing.store');


    Route::get('/weight/index', [WeightRangeController::class, 'index'])->name('weight.index');
    Route::post('/weight/save', [WeightRangeController::class, 'create'])->name('weight.save');
    Route::get('/weight/{id}/edit', [WeightRangeController::class, 'edit'])->name('weight.edit');
    Route::post('/weight/{id}/update', [WeightRangeController::class, 'update'])->name('weight.update');
    Route::delete('/weight/{id}/delete', [WeightRangeController::class, 'delete'])->name('weight.delete');

    Route::get('/laundrytype/index', [LaundryTypeController::class, 'index'])->name('laundrytype.index');
    Route::post('/laundrytype/save', [LaundryTypeController::class, 'create'])->name('laundrytype.save');
    Route::get('/laundrytype/{id}/edit', [LaundryTypeController::class, 'edit'])->name('laundrytype.edit');
    Route::post('/laundrytype/{id}/update', [LaundryTypeController::class, 'update'])->name('laundrytype.update');
    Route::delete('/laundrytype/{id}/delete', [LaundryTypeController::class, 'delete'])->name('laundrytype.delete');

    Route::get('/price/index', [LaundryPriceController::class, 'index'])->name('price.index');
    Route::post('/price/save', [LaundryPriceController::class, 'create'])->name('price.save');
    Route::get('/price/{id}/edit', [LaundryPriceController::class, 'edit'])->name('price.edit');
    Route::post('/price/{id}/update', [LaundryPriceController::class, 'update'])->name('price.update');
    Route::delete('/price/{id}/delete', [LaundryPriceController::class, 'delete'])->name('price.delete');

    Route::get('/users', function () {
        return 'This is the admin users list';
    })->name('users');
    Route::get('/settings', function () {
        return 'Admin settings page';
    })->name('settings');
});
