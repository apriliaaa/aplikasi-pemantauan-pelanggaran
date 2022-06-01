<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/nav', function () {
        return view('navigation-menu');
    })->name('navigation-menu');
});

Route::get('/admin/create-admin', [AdminController::class, "create"])->name("admin.create");
Route::post('/admin/create-admin', [AdminController::class, "store"])->name("admin.save");
Route::get('/admin/data-admin', [AdminController::class, "index"])->name('admin.data');
Route::get('/admin/data-admin/{id}', [AdminController::class, "destroy"])->name('admin.delete');
Route::get('/admin/edit-admin/{id}', [AdminController::class, "edit"])->name('admin.edit');
Route::post('/admin/edit-admin/{id}', [AdminController::class, "update"])->name('admin.update');

Route::get('/dosen/create-dosen', [DosenController::class, "create"])->name("dosen.create");
Route::post('/dosen/create-dosen', [DosenController::class, "store"])->name("dosen.save");
Route::get('/dosen/data-dosen', [DosenController::class, "index"])->name('dosen.data');
Route::get('/dosen/data-dosen/{id}', [DosenController::class, "destroy"])->name('dosen.delete');
Route::get('/dosen/edit-dosen/{id}', [DosenController::class, "edit"])->name('dosen.edit');
Route::post('/dosen/edit-dosen/{id}', [DosenController::class, "update"])->name('dosen.update');

Route::get('/create-dataMahasiswa', [MahasiswaController::class, "create"])->name("mahasiswa.create");
Route::post('/mahasiswa/create-mahasiswa', [MahasiswaController::class, "store"])->name("mahasiswa.save");