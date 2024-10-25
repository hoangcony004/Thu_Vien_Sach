<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SachController;
use App\Http\Controllers\admin\TacGiaController;
use App\Http\Controllers\admin\TheLoaiController;
use App\Http\Controllers\admin\NhaXuatBanController;

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

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/logout', [AuthController::class, 'getlogout'])->name('logout');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'public/admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'getDashboard'])->name('dashboard');
        Route::get('/sach', [SachController::class, 'getBooks'])->name('books');
        
        Route::get('/tac-gia', [TacGiaController::class, 'getTacGia'])->name('tacgia');
        Route::post('/post-tac-gia', [TacGiaController::class, 'postTacGia'])->name('Ptacgia');
        Route::get('/tac-gia-xem/{id}', [TacGiaController::class, 'getXemTacGia'])->name('xemTacGia');
        Route::post('/tac-gia-xoa/{id}', [TacGiaController::class, 'postXoaTacGia'])->name('xoaTacGia');
        
        Route::get('/the-loai', [TheLoaiController::class, 'getTheLoai'])->name('theloai');
        Route::post('/add-the-loai', [TheLoaiController::class, 'postAddTheLoai'])->name('addTheLoai');

        Route::get('/nha-xuat-ban', [NhaXuatBanController::class, 'getNhaXuatBan'])->name('nhaXuatBan');


        Route::post('/sach', [SachController::class, 'postBooks'])->name('Psach');
        Route::post('/the-loai', [TheLoaiController::class, 'postTheLoai'])->name('Ptheloai');
        
    });
});