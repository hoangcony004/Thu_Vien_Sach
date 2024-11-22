<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NotificationService;
use App\Models\TacGia;
use App\Models\TheLoai;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use Illuminate\Support\Str;

class SachController extends Controller
{
    protected $title;

    protected $notificationService; // Khai báo service thông báo

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService; // Khởi tạo service thông báo
    }

    public function index(Request $request) {}

    public function getSachs()
    {
        // Khai báo title
        $this->title = 'Admin - Kho Sách';

        $sachList = Sach::paginate(5);
        
        return view('admin.pages.sach')
            ->with('title', $this->title)
            ->with('sachList', $sachList);
    }



    public function postAddSach(Request $request)
    {

        // Xác thực dữ liệu
        $request->validate([
            'tenSach' => 'required|string|max:255',
            'maTacGia' => 'required|integer',
            'maTheLoai' => 'required|integer',
            'maNhaXuatBan' => 'required|integer',
            'ngayXuatBan' => 'required|date',
            'soLuong' => 'required|integer|min:1',
            'moTa' => 'required|string|max:500',
        ]);

        // Tạo mã sách ngẫu nhiên
        $maSach = $this->generateMaSach();

        Sach::create([
            'tenSach' => $request->tenSach,
            'maSach' => $maSach,
            'maTacGia' => $request->maTacGia,
            'maTheLoai' => $request->maTheLoai,
            'maNhaXuatBan' => $request->maNhaXuatBan,
            'ngayXuatBan' => $request->ngayXuatBan,
            'soLuong' => $request->soLuong,
            'moTa' => $request->moTa,
            'created_at' => now(),
        ]);

        // Thong bao thanh cong
        $this->notificationService->addNotification('Sách đã được thêm thành công!', 'success');

        return redirect()->route('sach');
    }




    private function generateMaSach()
    {
        do {
            // Tạo mã sách ngẫu nhiên 8 số
            $maSach = 'MS' . random_int(10000000, 99999999); // Ví dụ: MS12345678
        } while (Sach::where('maSach', $maSach)->exists()); // Kiểm tra xem mã sách đã tồn tại chưa

        return $maSach; // Trả về mã sách duy nhất
    }
}