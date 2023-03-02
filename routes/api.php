<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RegisterController;
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


Route::post('/admin/auth/login', [AuthController::class, 'login']);
Route::post('/admin/register', [RegisterController::class, 'store']);

Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
});