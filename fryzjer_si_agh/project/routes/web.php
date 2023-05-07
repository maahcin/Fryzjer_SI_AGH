<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('gallery', function () {
    return view('gallery.index');
})->name('gallery.index');

Route::get('prices', function () {
    return view('prices');
})->name('prices');


Route::resource('/inventory', \App\Http\Controllers\InventoryController::class)->middleware(['auth']);
/*
Route::get('requests/{request}/accept_request', [\App\Http\Controllers\RepairRequestController::class, 'accept_request'])->name('requests.accept_request');
Route::get('requests/{request}/accept', [\App\Http\Controllers\RepairRequestController::class, 'accept'])->name('requests.accept');
Route::get('requests/{request}/respond', [\App\Http\Controllers\RepairRequestController::class, 'respond'])->name('requests.respond');
Route::get('requests/send_respond', [\App\Http\Controllers\RepairRequestController::class, 'send_respond'])->name('requests.send_respond');
Route::get('requests/{request}/reject', [\App\Http\Controllers\RepairRequestController::class, 'reject'])->name('requests.reject');
Route::get('requests/{request}/finish', [\App\Http\Controllers\RepairRequestController::class, 'finish'])->name('requests.finish');
Route::resource('/requests', \App\Http\Controllers\RepairRequestController::class)->middleware(['auth']);

Route::get('orders/calendar', [\App\Http\Controllers\OrderController::class, 'calendar'])->name('orders.calendar');
Route::resource('/orders', \App\Http\Controllers\OrderController::class)->middleware(['auth']);

Route::get('requests/create', [\App\Http\Controllers\RepairRequestController::class, 'create'])->name('requests.create');
*/

Route::resource('/employees', \App\Http\Controllers\EmployeeController::class)->middleware(['auth']);
Route::get('employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'show'])->name('employees.show');
Route::get('employees/create', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create');

Route::get('/delivery', [\App\Http\Controllers\DeliveryController::class, 'show'])->name('delivery.show');
Route::get('/delivery/create', [\App\Http\Controllers\DeliveryController::class, 'create_products'])->name('delivery.create_products');
Route::post('/delivery/show', [\App\Http\Controllers\DeliveryController::class, 'store'])->name('delivery.store');
Route::get('/delivery/{id}', [\App\Http\Controllers\DeliveryController::class, 'show2'])->name('delivery.show2');

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create_products'])->name('product.create_products');
Route::post('/product/show', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/products/cost', [\App\Http\Controllers\ProductController::class, 'cost'])->name('product.cost');

Route::get('/delraport', [\App\Http\Controllers\DeliveryController::class, 'raport'])->name('delivery.raport'); //pz
Route::get('/products/pdf', [\App\Http\Controllers\ProductController::class, 'cost']);

Route::resource('/services', \App\Http\Controllers\ServiceController::class)->middleware(['auth']);
