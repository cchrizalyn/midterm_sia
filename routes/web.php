<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\EquipmentController;

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

Route::get('/login', function () {
    return view('login');
});

// Route::get('/login', function () {
//     return view('login');
// });
Route::get('/registration', function () {
    return view('/patient/registration');
});

Route::get('/dashboard', function () {
    return view('admin.admin_dashboard')->name('admin.dashboard');
});

Route::get('/admin/admin_inventory', [InventoryController::class, 'index'])->name('admin.inventory');
Route::resource('products', InventoryController::class);
Route::get('/admin/report_generation', [InventoryController::class, 'reportGeneration'])->name('admin.inventory.filter');
// Explicitly define routes for edit, update, and destroy actions
Route::get('/products/{product}/view', [InventoryController::class, 'viewProduct'])->name('products.view');
Route::get('/products/{product}/edit', [InventoryController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [InventoryController::class, 'update'])->name('products.update');
Route::delete('/products/{products}', [InventoryController::class, 'destroy'])->name('products.destroy');
// Route::put('/products/{product}', 'InventoryController@update')->name('products.update');

//category
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::post('/categories', 'CategoryController@store')->name('categories.store');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::resource('categories', CategoryController::class);

Route::resource('products', InventoryController::class);


//out of stock
Route::get('/dashboard', [InventoryController::class, 'outOfStock'])->name('admin.dashboard');

//qty
Route::post('/products/updateQuantity', [InventoryController::class, 'updateQuantity'])->name('admin.products.updQuantity');