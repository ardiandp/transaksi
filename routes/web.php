<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MasterController;

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
Route::get('/theme', function () {
    return view('layouts.content');
});
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile')->middleware('auth');


// routes/web.php

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

// master gerai
Route::get('/master/gerai', [MasterController::class, 'gerai'])->name('master.gerai');
Route::post('/master/geraistore', [MasterController::class, 'geraistore'])->name('master.geraistore');
Route::delete('/master/gerai/{id}', [MasterController::class, 'geraidestroy'])->name('master.geraidestroy');
Route::put('/master/gerai/{id}', [MasterController::class, 'geraiupdate'])->name('master.geraiupdate');

//master perawatan 
Route::get('/master/perawatan', [MasterController::class, 'perawatan'])->name('master.perawatan');
Route::get('/master/perawatancreate', [MasterController::class, 'perawatancreate'])->name('master.perawatancreate');
Route::post('/master/perawatanstore', [MasterController::class, 'perawatanstore'])->name('master.perawatanstore');
Route::get('/master/perawatan/{id}/edit', [MasterController::class, 'perawatanedit'])->name('master.perawatanedit');
Route::delete('/master/perawatan/{id}', [MasterController::class, 'perawatandestroy'])->name('master.perawatandestroy');
Route::put('/master/perawatan/{id}', [MasterController::class, 'perawatanupdate'])->name('master.perawatanupdate');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
