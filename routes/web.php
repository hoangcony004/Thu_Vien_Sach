<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SachController;
use App\Http\Controllers\admin\TacGiaController;
use App\Http\Controllers\admin\TheLoaiController;
use App\Http\Controllers\admin\NhaXuatBanController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\admin\ForgotPasswordController;

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

Route::get('/', function () {
    return view('admin.pages.home-page');
});
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/logout', [AuthController::class, 'getlogout'])->name('logout');
// Route::get('/reset-password', [AuthController::class, 'getResetPW'])->name('resetPW');
// Route::post('/reset-password', [AuthController::class, 'postResetPW'])->name('PresetPW');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'public/admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'getDashboard'])->name('dashboard');
        Route::get('/sach', [SachController::class, 'getBooks'])->name('books');

        Route::get('/tac-gia', [TacGiaController::class, 'getTacGia'])->name('tacgia');
        Route::post('/post-add-tac-gia', [TacGiaController::class, 'postAddTacGia'])->name('Ptacgia');
        Route::get('/tac-gia/edit-tac-gia/{id}', [TacGiaController::class, 'getEditTacGia'])->name('editTacGia');
        Route::put('/tac-gia/edit-tac-gia/{id}', [TacGiaController::class, 'postEditTacGia'])->name('PEditTacGia');
        Route::post('/tac-gia/tac-gia-xoa/{id}', [TacGiaController::class, 'postDeleteTacGia'])->name('xoaTacGia');
        Route::get('/tac-gia/search-tac-gia', [TacGiaController::class, 'getTacGia'])->name('searchTacGia');

        Route::get('/the-loai', [TheLoaiController::class, 'getTheLoai'])->name('theloai');
        Route::post('/the-loai/add-the-loai', [TheLoaiController::class, 'postAddTheLoai'])->name('addTheLoai');
        Route::get('/the-loai/edit-the-loai/{id}', [TheLoaiController::class, 'getEditTheLoai'])->name('editTheLoai');
        Route::post('/the-loai/edit-the-loai/{id}', [TheLoaiController::class, 'postEditTheLoai'])->name('PEditTheLoai');
        Route::post('/the-loai/xoa-the-loai/{id}', [TheLoaiController::class, 'postDeleteTheLoai'])->name('xoaTheLoai');


        Route::get('/nha-xuat-ban', [NhaXuatBanController::class, 'getNhaXuatBan'])->name('nhaXuatBan');


        Route::post('/sach', [SachController::class, 'postBooks'])->name('Psach');
        Route::post('/the-loai', [TheLoaiController::class, 'postTheLoai'])->name('Ptheloai');


        Route::get('/tim-kiem-chuc-nang-he-thong', [SearchController::class, 'index'])->name('search');
    });
});




Route::post('/clear-notifications', function () {
    session(['notifications' => []]); // Xóa tất cả thông báo trong session
    return response()->json(['success' => true]);
});