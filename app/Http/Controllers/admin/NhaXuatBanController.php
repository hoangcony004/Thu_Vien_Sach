<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NotificationService; 

class NhaXuatBanController extends Controller
{
    protected $title;

    protected $notificationService; // Khai báo service thông báo

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService; // Khởi tạo service thông báo
    }

    public function index(Request $request) {}

    public function getNhaXuatBan()
    {

        // Khai báo title
        $this->title = 'Admin - Nhà Xuất Bản';

        // Truy vấn lấy dữ liệu từ bảng với phân trang 5 phần tử 1 trang
        // $tacgiaList = TacGia::paginate(5);

        // Trả về view với dữ liệu 'tacgiaList'
        return view('admin.pages.nha-xuat-ban')
            ->with('title', $this->title);
    }
}