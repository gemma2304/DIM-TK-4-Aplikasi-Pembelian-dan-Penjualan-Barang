<?php

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Barang
    Route::get('/', App\Livewire\Barang\Index::class)->name('index');
    Route::get('/tambah-barang', App\Livewire\Barang\Create::class)->name('create-barang');
    Route::get('/edit/{id}', App\Livewire\Barang\Edit::class)->name('edit-barang');

    // Penjualan
    Route::get('/penjualan', App\Livewire\Penjualan\Index::class)->name('index.penjualan');
    Route::get('/pembelian', App\Livewire\Penjualan\Show::class)->name('show.penjualan');
    Route::get('/pesan-barang/{id}', App\Livewire\Penjualan\Create::class)->name('create.penjualan');
    Route::get('/edit-pesanan/{id}', App\Livewire\Penjualan\Edit::class)->name('edit.penjualan');
});
