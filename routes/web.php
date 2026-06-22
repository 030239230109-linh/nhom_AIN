<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeController2;
use App\Http\Controllers\HomeController3;
use App\Http\Controllers\HomeController4;
use App\Http\Controllers\HomeController5;
use App\Http\Controllers\LaptopController7;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SanPhamController1;

// Trang chủ
Route::get('/', [HomeController::class, 'index']);

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Câu 5: Tìm kiếm laptop
Route::post('/timkiem', [HomeController5::class, 'search'])->name('laptop.search');

// Trang khác
Route::get('/home', [LaptopController7::class, 'index'])->name('home');

// Sản phẩm
Route::get('/san-pham', [SanPhamController1::class, 'index'])->name('sanpham.index7');
Route::get('/san-pham/{id}', [SanPhamController1::class, 'show'])->name('sanpham.show');
Route::delete('/san-pham/{id}', [SanPhamController1::class, 'destroy'])->name('sanpham.destroy');

// Laptop
Route::get('/laptop', [HomeController4::class, 'index4'])->name('laptop.index4');
Route::get('/laptop/theloai/{id}', [HomeController2::class, 'theloai']);
Route::get('/laptop/loc', [HomeController2::class, 'loc']);
Route::get('/laptop/chitiet/{id}', [HomeController4::class, 'chitiet'])->name('laptop.chitiet');

// Giỏ hàng
Route::post('/gio-hang/them', [HomeController4::class, 'addCart'])->name('cart.add');
Route::get('/gio-hang', [HomeController4::class, 'cart'])->name('cart.page');
Route::get('/gio-hang/xoa/{id}', [HomeController4::class, 'deleteCart'])->name('cart.delete');
Route::post('/gio-hang/dat-hang', [HomeController4::class, 'order'])->name('cart.order');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';