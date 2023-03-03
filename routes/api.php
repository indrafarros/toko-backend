<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RegisterController;

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


Route::prefix('product')->group(function () {
});
Route::post('/admin/auth/login', [AuthController::class, 'login']);
Route::post('/admin/register', [RegisterController::class, 'store']);

Route::post('/admin/product/create', [ProductController::class, 'store']);
Route::delete('/admin/product/delete/{slug}', [ProductController::class, 'destroy']);


Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{name}', [CategoryController::class, 'show']);
Route::post('/category/create', [CategoryController::class, 'store']);
Route::get('/category/{name}/edit', [CategoryController::class, 'edit']);

Route::get('/brands', [BrandController::class, 'index']);
Route::get('/brand/{id}', [BrandController::class, 'show']);
Route::post('/brand/create', [BrandController::class, 'store']);
Route::get('/brand/{name}/edit', [BrandController::class, 'edit']);
