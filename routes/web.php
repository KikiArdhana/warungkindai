<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\TransaksiController;


Route::get('/cek-reward/{no_telepon}', [RewardController::class, 'cekReward']);
// routes/web.php



Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('/', function () {
    return view('welcome');
});
