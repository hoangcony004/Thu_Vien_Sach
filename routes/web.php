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
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'public/admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'getDashboard'])->name('dashboard');

        Route::get('/sach', [SachController::class, 'getSachs'])->name('sach');
        Route::post('/post-add-sach', [SachController::class, 'postAddSach'])->name('Psach');
        Route::get('/sach/edit-sach/{id}', [SachController::class, 'getEditSach'])->name('editSach');
        Route::put('/sach/edit-sach/{id}', [SachController::class, 'postEditSach'])->name('PEditSach');
        Route::post('/sach/xoa-sach/{id}', [SachController::class, 'postDeleteSach'])->name('xoaSach');
        Route::get('/sach/search-sach', [SachController::class, 'getBooks'])->name('searchSach');

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
        Route::post('/nha-xuat-ban/add-nha-xuat-ban', [NhaXuatBanController::class, 'postAddNhaXuatBan'])->name('addNhaXuatBan');
        Route::get('/nha-xuat-ban/edit-nha-xuat-ban/{id}', [NhaXuatBanController::class, 'getEditNhaXuatBan'])->name('editNhaXuatBan');
        Route::post('/nha-xuat-ban/edit-nha-xuat-ban/{id}', [NhaXuatBanController::class, 'postEditNhaXuatBan'])->name('PEditNhaXuatBan');
        Route::post('/nha-xuat-ban/xoa-nha-xuat-ban/{id}', [NhaXuatBanController::class, 'postDeleteNhaXuatBan'])->name('xoaNhaXuatBan');
        Route::get('/nha-xuat-ban/search-nha-xuat-ban', [NhaXuatBanController::class, 'getNhaXuatBan'])->name('searchNhaXuatBan');



        Route::get('/tim-kiem-chuc-nang-he-thong', [SearchController::class, 'index'])->name('search');
    });
});




Route::post('/clear-notifications', function () {
    // Xóa thông báo từ session
    session(['notifications' => []]);

    return response()->json([
        'success' => true,
    ]);
})->name('clear-notifications');