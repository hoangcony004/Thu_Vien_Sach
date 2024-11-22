<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NotificationService;
use App\Models\NhaXuatBan;

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
        $nhaxuatbanList = NhaXuatBan::paginate(5);

        // Trả về view với dữ liệu 'tacgiaList'
        return view('admin.pages.nha-xuat-ban')
            ->with('title', $this->title)
            ->with('nhaxuatbanList', $nhaxuatbanList);
    }

    public function getAPINhaXuatBan(Request $request)
    {
        $search = $request->input('q'); // Lấy từ khóa tìm kiếm
        $nhaXuatBans = NhaXuatBan::where('tenNhaXuatBan', 'LIKE', "%$search%")
            ->take(10) // Giới hạn số lượng kết quả trả về
            ->get(['id', 'tenNhaXuatBan']); // Chỉ lấy cột cần thiết

        return response()->json($nhaXuatBans);
    }

    public function postAddNhaXuatBan(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'tenNhaXuatBan' => 'required|string|max:255',
            'soDienthoai' => 'required|numeric|max:10',
            'email' => 'nullable|email|max:255',
            'diaChi' => 'required|string',
        ]);

        // Lưu dữ liệu vào model NhaXuatBan
        NhaXuatBan::create([
            'tenNhaXuatBan' => $request->tenNhaXuatBan,
            'soDienthoai' => $request->soDienthoai,
            'email' => $request->email,
            'diaChi' => $request->diaChi,
        ]);

        $this->notificationService->addNotification('Nhà xuất bản đã được thêm thành công!', 'success');

        // Chuyển hướng hoặc thông báo thành công
        return redirect()->route('nhaXuatBan');
    }

    public function getEditNhaXuatBan($id)
    {
        // Khai báo title
        $this->title = 'Admin - Sửa Nhà Xuất Bản';

        // Tìm nhà xuất bản theo ID
        $nhaxuatban = NhaXuatBan::find($id);

        // Chuyển hướng
        return view('admin.partials.nhaxuatban.form-edit-nha-xuat-ban', compact('nhaxuatban'))
            ->with('title', $this->title);
    }

    public function postEditNhaXuatBan(Request $request, $id)
    {
        //    dd($request);
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'tenNhaXuatBan' => 'required|string|max:255',
            'soDienthoai' => 'required|numeric|digits_between:9,11',
            'email' => 'nullable|email|max:255',
            'diaChi' => 'required|string',
        ]);


        // Tìm nhà xuất bản theo ID
        $nhaxuatban = NhaXuatBan::find($id);
        if (!$nhaxuatban) {
            // Nếu không tìm thấy nhà xuất bản, trả về thông báo lỗi
            $this->notificationService->addNotification('Nhà xuất bản không tồn tại!', 'error');
            return redirect()->route('nhaXuatBan');
        }

        // Cập nhật dữ liệu vào cơ sở dữ liệu
        $nhaxuatban->update([
            'tenNhaXuatBan' => $request->tenNhaXuatBan,
            'soDienthoai' => $request->soDienthoai,
            'email' => $request->email,
            'diaChi' => $request->diaChi,
        ]);

        // Thêm thông báo thành công
        $this->notificationService->addNotification('Nhà xuất bản được cập nhật!', 'success');

        // Chuyển hướng về trang danh sách nhà xuất bản
        return redirect()->route('nhaXuatBan');
    }

    public function postDeleteNhaXuatBan($id)
    {
        // Tìm nhà xuất bản theo ID
        $nhaxuatban = NhaXuatBan::find($id);

        // Kiểm tra nếu tồn tại thể loại
        if ($nhaxuatban) {
            // Xóa thể loại
            $nhaxuatban->delete();

            // Thêm thông báo thành công vào session
            $this->notificationService->addNotification('Nhà xuất bản đã được xóa thành công!', 'success');
        } else {
            // Thêm thông báo lỗi nếu không tìm thấy thể loại
            $this->notificationService->addNotification('Không tìm thấy nhà xuất bản!', 'error');
        }

        return redirect()->route('nhaXuatBan');
    }
}
