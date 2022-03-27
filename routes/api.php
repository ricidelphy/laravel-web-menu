<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/area', [AreaController::class, 'index']);
Route::get('/meja', [MejaController::class, 'index']);
Route::post('/order', [OrderController::class, 'order']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
