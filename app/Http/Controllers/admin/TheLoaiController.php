<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoai;

class TheLoaiController extends Controller
{
    protected $title;

    public function index(Request $request) {}

    public function getTheLoai()
    {
        // khai báo title
        $this->title = 'Admin - Theloai';

        // Truy vấn lưu dữ liệu tu bảng 'the_loai' với phân trang 5 phần tử 1 trang
        $theloaiList = TheLoai::paginate(5);

        // dd($theloaiList);


        // chuyển hướng và truyền thông báo xuất
        return view('admin.pages.the-loai')
            ->with('title', $this->title)
            ->with('theloaiList', $theloaiList);
    }

    public function postAddTheLoai(Request $request)
    {
        try {
            // Validate dữ liệu đầu vào
            $request->validate([
                'tenTheLoai' => 'required|string|max:255',
            ]);

            // Lưu dữ liệu vào cơ sở dữ liệu
            TheLoai::create([
                'tenTheLoai' => $request->tenTheLoai,
                'created_at' => now(), // Gán ngày tạo
                'updated_at' => null,   // Đặt giá trị null cho ngày sửa
            ]);

            // Chuyển hướng khi thành công
            return redirect()->route('theloai')
                ->with('success', 'Thể loại đã được thêm thành công!');
        } catch (\Exception $e) {
            // Xử lý khi có lỗi
            return redirect()->route('theloai')
                ->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
}
