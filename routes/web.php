<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;


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

Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin All Route

Route::controller(AdminController::class)->group(function () {
  Route::get('/logout', 'destroy')->name('admin.logout');
  Route::get('/profile', 'Profile')->name('admin.profile');
  Route::get('/profile/edit', 'EditProfile')->name('edit.profile');

});

// Customers All Route

Route::controller(CustomerController::class)->group(function () {

    Route::get('/customer/create', [CustomerController::class, 'Create'])->name('customer.create');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/all', 'Show')->name('customer.view');
    Route::resource('customers', CustomerController::class);
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');


  });

  // Products All Route

Route::controller(ProductController::class)->group(function () {

    Route::get('/product/create', 'Create')->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/product/all', 'show')->name('product.view');
    Route::resource('products', ProductController::class);
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

  });


Route::controller(SalesController::class)->group(function () {

    Route::get('/pos', 'POS')->name('sales.create');
//    Route::get('/sales', [SalesController::class, 'create'])->name('sales.create');
    Route::post('/sales/store', [SalesController::class, 'store'])->name('sales.store');
    Route::get('/sales/view', [SalesController::class, 'index'])->name('sales.index');
    Route::resource('sales', SalesController::class);
    Route::delete('/sales/{id}', [SalesController::class, 'destroy'])->name('sales.destroy');

//    Route::get('/sales/all', 'Sales')->name('sales.view');

});

