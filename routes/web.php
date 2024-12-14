<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryMovementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('products', ProductController::class);
Route::resource('inventory/movements', InventoryMovementController::class);
Route::resource('categories', CategoryController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('orders', OrderController::class);

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
Route::get('/reports/inventory', [ReportController::class, 'inventory'])->name('reports.inventory');
Route::get('/reports/customers', [ReportController::class, 'customers'])->name('reports.customers');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
