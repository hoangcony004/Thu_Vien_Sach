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

    public function getTacgia(Request $request)
    {
        // Khai báo title
        $this->title = 'Admin - Tác Giả';

        // Lấy giá trị tìm kiếm từ request
        $query = $request->input('query');

        // Nếu có giá trị tìm kiếm, áp dụng điều kiện tìm kiếm, nếu không thì lấy toàn bộ
        if ($query) {
            // Tìm kiếm tác giả theo tên, phân trang 5 phần tử mỗi trang
            $tacgiaList = TacGia::where('tenTacGia', 'like', '%' . $query . '%')->paginate(5);
            
        } else {
            // Nếu không có tìm kiếm, lấy tất cả tác giả với phân trang 5 phần tử mỗi trang
            $tacgiaList = TacGia::paginate(5);
        }

        // Trả về view với dữ liệu 'tacgiaList' và 'query'
        return view('admin.pages.tac-gia')
            ->with('title', $this->title)
            ->with('tacgiaList', $tacgiaList)
            ->with('query', $query);
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

        // Kiểm tra nếu ngày sinh lớn hơn ngày hiện tại
        $ngaySinh = $request->ngaySinh;
        if (strtotime($ngaySinh) > time()) {
            // Nếu ngày sinh lớn hơn ngày hiện tại, trả về thông báo lỗi
            $this->notificationService->addNotification('Ngày sinh không thể lớn hơn ngày hiện tại!', 'error');
            return redirect()->back()->withInput();
        }

        // Lưu dữ liệu vào cơ sở dữ liệu
        TacGia::create([
            'tenTacGia' => $request->tenTacGia,
            'ngaySinh' => $ngaySinh,
            'ngayMat' => $request->ngayMat ? $request->ngayMat : null,
            'moTa' => $request->moTa,
            'updated_at' => null,
            'created_at' => now(),
        ]);

        // Sử dụng NotificationService để gửi thông báo
        $this->notificationService->addNotification('Tác giả đã được thêm thành công!', 'success');

        return redirect()->route('tacgia');
    }

    public function getEditTacGia($id)
    {
        // Tìm tác giả theo ID
        $tacgia = TacGia::find($id);

        // Nếu tác giả không tồn tại, trả về lỗi và thông báo
        if (!$tacgia) {
            // Gọi hàm addNotification tự trình này này vào service để gửi thông báo
            $this->notificationService->addNotification('Không tìm thấy tác giả cần sửa!', 'error');
            return redirect()->route('tacgia');
        }

        // Khai báo title
        $this->title = 'Admin - Sửa Tác Giả';

        // Trả về view với dữ liệu 'tacgia' với title
        return view('admin.partials.tacgia.form-edit-tac-gia')
            ->with('title', $this->title)
            ->with('tacgia', $tacgia);
    }

    public function postEditTacGia($id, Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'tenTacGia' => 'required|string|max:255',
            'ngaySinh' => 'required|date',
            'ngayMat' => 'nullable|date|after_or_equal:ngaySinh',
            'moTa' => 'nullable|string',
        ]);

        // Tìm tác giả theo ID
        $tacgia = TacGia::find($id);

        // Nếu tác giả không tồn tại, trả về lỗi và thông báo
        if (!$tacgia) {
            // Gọi hàm addNotification từ service để gửi thông báo
            $this->notificationService->addNotification('Không tìm thấy tác giả cần sửa!', 'error');
            return redirect()->route('tacgia');
        }

        // Kiểm tra nếu ngày sinh lớn hơn ngày hiện tại
        $ngaySinh = $request->ngaySinh;
        if (strtotime($ngaySinh) > time()) {
            // Nếu ngày sinh lớn hơn ngày hiện tại, trả về thông báo lỗi
            $this->notificationService->addNotification('Ngày sinh không thể lớn hơn ngày hiện tại!', 'error');
            return redirect()->back()->withInput();
        }

        // Lưu tên tác giả cũ
        $oldName = $tacgia->tenTacGia;

        // Cập nhật thông tin tác giả
        $tacgia->update([
            'tenTacGia' => $request->tenTacGia,
            'ngaySinh' => $request->ngaySinh,
            'ngayMat' => $request->ngayMat ? $request->ngayMat : null,
            'moTa' => $request->moTa,
            'updated_at' => now(),
        ]);

        // Thêm thông báo thành công với tên tác giả cũ và mới
        // $this->notificationService->addNotification('Đã thay đổi tác giả "' . $oldName . '" thành "' . $tacgia->tenTacGia . '"', 'success');
        // Thêm thông báo thành công với tên tác giả mới
        $this->notificationService->addNotification('Đã sửa tác giả "' . $tacgia->tenTacGia . '"', 'success');

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