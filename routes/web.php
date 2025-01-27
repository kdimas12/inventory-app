<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockMutationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('supplier/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

    Route::get('barang', [ProductController::class, 'index'])->name('product.index');
    Route::get('barang/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('barang', [ProductController::class, 'store'])->name('product.store');
    Route::get('barang/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('barang/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('barang/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('kategori', [CategoryController::class, 'index'])->name('category.index');
    Route::get('kategori/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('kategori', [CategoryController::class, 'store'])->name('category.store');
    Route::get('kategori/{kategori}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('kategori/{kategori}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('kategori/{kategori}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('pembelian', [PurchaseController::class, 'index'])->name('purchase.index');
    Route::get('pembelian/create', [PurchaseController::class, 'create'])->name('purchase.create');
    Route::post('pembelian', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::get('pembelian/{purchase}/edit', [PurchaseController::class, 'edit'])->name('purchase.edit');
    Route::put('pembelian/{purchase}', [PurchaseController::class, 'update'])->name('purchase.update');
    Route::delete('pembelian/{purchase}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');

    Route::get('penjualan', [SaleController::class, 'index'])->name('sales.index');
    Route::get('penjualan/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('penjualan', [SaleController::class, 'store'])->name('sales.store');
    Route::get('penjualan/{sale}/edit', [SaleController::class, 'edit'])->name('sales.edit');
    Route::put('penjualan/{sale}', [SaleController::class, 'update'])->name('sales.update');
    Route::delete('penjualan/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');

    Route::get('inventori', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('inventori/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::put('inventori/{inventory}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('inventori/{inventory}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

    Route::get('mutasi-stok', [StockMutationController::class, 'index'])->name('stock-mutation.index');
    Route::get('mutasi-stok/{stockMutation}/edit', [StockMutationController::class, 'edit'])->name('stock-mutation.edit');
    Route::put('mutasi-stok/{stockMutation}', [StockMutationController::class, 'update'])->name('stock-mutation.update');
    Route::delete('mutasi-stok/{stockMutation}', [StockMutationController::class, 'destroy'])->name('stock-mutation.destroy');

    Route::get('manajemen-pengguna', [UserController::class, 'index'])->name('user.index');
    Route::get('manajemen-pengguna/create', [UserController::class, 'create'])->name('user.create');
    Route::post('manajemen-pengguna', [UserController::class, 'store'])->name('user.store');
    Route::get('manajemen-pengguna/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('manajemen-pengguna/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('manajemen-pengguna/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});
