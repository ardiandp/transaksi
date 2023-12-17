<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NorekController;
use App\http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;

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

/* Route::get('/home', function () {
    return view('home');
}); */

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/data', [UserController::class, 'getData'])->name('user.data');
//Norekening
Route::resource('norek', NorekController::class);
Route::get('norek/{id}/edit', [NorekController::class, 'edit'])->name('norek.edit');
Route::put('norek/{id}', [NorekController::class, 'update'])->name('norek.update');
Route::delete('/norek/destroy/{id}', 'NorekController@destroy')->name('norek.destroy');

//Halaman Login
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Halaman Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/data', [AdminController::class, 'getData'])->name('admin.data');
//Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');

// Halaman produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');