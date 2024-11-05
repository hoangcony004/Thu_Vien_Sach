<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TacGia;
use App\Services\NotificationService; // Thêm dòng này để sử dụng NotificationService

class TacGiaController extends Controller
{
    protected $title;
    protected $notificationService; // Khai báo service thông báo

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService; // Khởi tạo service thông báo
    }

    public function index(Request $request) {}

    public function getTacgia()
    {
        // Khai báo title
        $this->title = 'Admin - Tác Giả';

        // Truy vấn lấy dữ liệu từ bảng 'tac_gia' với phân trang 5 phần tử 1 trang
        $tacgiaList = TacGia::paginate(5);  // TacGia là model tương ứng với bảng 'tac_gia'

        // Trả về view với dữ liệu 'tacgiaList'
        return view('admin.pages.tac-gia')
            ->with('title', $this->title)
            ->with('tacgiaList', $tacgiaList);
    }

    public function postAddTacGia(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'tenTacGia' => 'required|string|max:255',
            'ngaySinh' => 'required|date',
            'ngayMat' => 'nullable|date|after_or_equal:ngaySinh',
            'moTa' => 'nullable|string',
        ]);

        // Lưu dữ liệu vào cơ sở dữ liệu
        TacGia::create([
            'tenTacGia' => $request->tenTacGia,
            'ngaySinh' => $request->ngaySinh,
            'ngayMat' => $request->ngayMat ? $request->ngayMat : null,
            'moTa' => $request->moTa,
            'updated_at' => null,
            'created_at' => now(),
        ]);

        // Sử dụng NotificationService để gửi thông báo
        $this->notificationService->addNotification('Tác giả đã được thêm thành công!', 'success');

        return redirect()->route('tacgia');
    }

    public function postDeleteTacGia($id)
    {
        // Tìm tác giả theo ID
        $tacgia = TacGia::find($id);

        // Nếu tác giả không tồn tại, trả về lỗi và thông báo
        if (!$tacgia) {
            // Gọi hàm addNotification từ service để gửi thông báo
            $this->notificationService->addNotification('Không tìm thấy tác giả cần xóa!', 'error');
            return redirect()->route('tacgia');
        }

        // Xóa tác giả
        $tacgia->delete();

        // Sử dụng NotificationService để gửi thông báo
        $this->notificationService->addNotification('Tác giả đã được xóa thành công!', 'success');

        return redirect()->route('tacgia');
    }
}