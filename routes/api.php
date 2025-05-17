<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UmkmAuthController;
use App\Http\Controllers\UMKMController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('login');
Route::post('/umkm/login', [UmkmAuthController::class, 'login']); // 🔥 Login UMKM
Route::post('/umkm/register', [UmkmAuthController::class, 'register']); // ✅ Register UMKM

Route::middleware(['auth.admin'])->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
    Route::get('/admin/me', [AdminAuthController::class, 'me']);

    Route::post('/umkms/{id}/products', [ProductController::class, 'store']);  // 🔥 API Tambah Produk
    Route::get('/umkms/{id}/products', [ProductController::class, 'getByUMKM']); // 🔥 API Get Produk by UMKM ID
    Route::delete('/products/{id}', [ProductController::class, 'destroy']); // 🔥 API Hapus Produk

    Route::post('/categories', [CategoryController::class, 'store']);   // Create new category
    Route::put('/categories/{id}', [CategoryController::class, 'update']); // Update category
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // Delete category

    Route::post('/umkms', [UMKMController::class, 'store']);   // Create new UMKM
    Route::put('/umkms/{id}', [UMKMController::class, 'update']); // Update UMKM
    Route::delete('/umkms/{id}', [UMKMController::class, 'destroy']); // Delete UMKM

    // 🔥 New: Approval & Rejection Routes
    Route::post('/umkms/{id}/approve', [UMKMController::class, 'approveUMKM']); // ✅ Approve UMKM
    Route::post('/umkms/{id}/reject', [UMKMController::class, 'rejectUMKM']); // ❌ Reject UMKM

    Route::get('/umkms/{id}/income', [IncomeController::class, 'getIncomeByUMKM']);
});


Route::middleware(['auth.umkm'])->group(function () {
    Route::post('/umkm/logout', [UmkmAuthController::class, 'logout']); // 🔥 Logout UMKM
    Route::get('/umkm/me', [UmkmAuthController::class, 'me']); // 🔥 Get UMKM yang login

    Route::put('/umkms/{id}', [UMKMController::class, 'update']); // Update UMKM

    Route::get('/umkms/{id}/products', [ProductController::class, 'getByUMKM']); // 🔥 API Get Produk by UMKM ID
    Route::put('/products/{id}', [ProductController::class, 'update']);  // 🔥 API Edit Produk

    Route::get('/incomes', [IncomeController::class, 'index']);
    Route::get('/incomes/{income}', [IncomeController::class, 'show']);
    Route::delete('/incomes/{income}', [IncomeController::class, 'destroy']);
});
Route::delete('/products/{id}', [ProductController::class, 'destroy']); // 🔥 API Hapus Produk
Route::post('/umkms/{id}/products', [ProductController::class, 'store']);  // 🔥 API Tambah Produk
Route::put('/products/{id}', [ProductController::class, 'update']);  // 🔥 API Edit Produk

Route::post('/forgot-password', [UmkmAuthController::class, 'sendResetPassword']);
Route::post('/reset-password', [UmkmAuthController::class, 'resetPassword']);

Route::get('/categories', [CategoryController::class, 'index']);   // Get all categories
Route::get('/categories/{id}', [CategoryController::class, 'show']); // Get category by ID
Route::get('/umkms', [UMKMController::class, 'index']);   // Get all UMKM
Route::get('/umkms/{id}', [UMKMController::class, 'show']); // Get UMKM by ID
Route::post('/incomes', [IncomeController::class, 'store']);
Route::put('/incomes/{income}', [IncomeController::class, 'update']);
