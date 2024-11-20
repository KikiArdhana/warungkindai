<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RewardController;

Route::get('/cek-reward/{no_telepon}', [RewardController::class, 'cekReward']);

Route::get('/', function () {
    return view('welcome');
});
