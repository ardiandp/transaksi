<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NorekController;
use App\http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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

// no rekening dengan yajra datatable
//Route::get('/norek', [NorekController::class, 'index'])->name('norek');
//Route::get('norek', [NorekController::class, 'index'])->name('norek.index');
//Route::get('norek-data', [NorekController::class, 'getData'])->name('norek.data');
Route::resource('norek', NorekController::class);
Route::get('norek/{id}/edit', [NorekController::class, 'edit'])->name('norek.edit');
Route::put('norek/{id}', [NorekController::class, 'update'])->name('norek.update');



Route::get('/login', [AuthController::class, 'login'])->name('login');

// ini buat admin 
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/data', [AdminController::class, 'getData'])->name('admin.data');
