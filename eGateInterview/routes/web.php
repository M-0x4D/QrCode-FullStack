<?php

use App\Http\Controllers\Api\CheckQrCodeStatus;
use App\Http\Controllers\Api\GenerateQrCode;
use App\Http\Controllers\Api\UpdateQrCodeStatus;
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
Route::get("/generate", [GenerateQrCode::class , 'generate'])->name("");
Route::get("/qr-codes", [GenerateQrCode::class , 'qrCodes'])->name("");
Route::put("/update-qrcode", [UpdateQrCodeStatus::class , '__invoke'])->name("");
Route::get("/check-status", [CheckQrCodeStatus::class , '__invoke'])->name("");



Route::get('/', function () {
    return view('welcome');
});
