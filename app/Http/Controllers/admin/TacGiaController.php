<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TacGia;

class TacGiaController extends Controller
{
    protected $title;

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


    public function postTacGia(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'tenTacGia' => 'required|string|max:255',
            'ngaySinh' => 'required|date',
            'ngayMat' => 'nullable|date|after_or_equal:ngaySinh',
            'moTa' => 'nullable|string',
        ]);

        // dd($request);
        // Lưu dữ liệu vào cơ sở dữ liệu
        TacGia::create([
            'tenTacGia' => $request->tenTacGia,
            'ngaySinh' => $request->ngaySinh,
            'ngayMat' => $request->ngayMat ? $request->ngayMat : null,
            'moTa' => $request->moTa,
            'updated_at' => null,
            'created_at' => now(),
        ]);

        // Chuyển hành trang
        return redirect()->route('tacgia')
            ->with('success', 'Tác giả đã được thêm thành công!');
    }

    public function getXemTacGia($id)
    {
        // Tìm tác giả theo ID
        $tacgia = TacGia::find($id);

        // Nếu tác giả không tồn tại, trả về lỗi
        if (!$tacgia) {
            return response()->json(['error' => 'Tác giả không tồn tại!'], 404);
        }

        // Trả về view với dữ liệu tác giả
        return view('admin.partials.tacgia.form-show-tac-gia', compact('tacgia'));
    }

    public function putTacGia(Request $request, $id)
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

        // Nếu tác giả không tồn tại, trả về lỗi
        if (!$tacgia) {
            return response()->json(['error' => 'Tác giả không tồn tại!'], 404);
        }

        // Lưu dữ liệu vào cơ sở dữ liệu
        $tacgia->update([
            'tenTacGia' => $request->tenTacGia,
            'ngaySinh' => $request->ngaySinh,
            'ngayMat' => $request->ngayMat ? $request->ngayMat : null,
            'moTa' => $request->moTa,
            'updated_at' => now(),
        ]);

        // Chuyển hành trang
        return redirect()->route('tacgia')
            ->with('success', 'Tác giả đã được cập nhật thành công!');
    }

    public function postXoaTacGia($id)
    {
        // Tìm tác giả theo ID
        $tacgia = TacGia::find($id);

        // Nếu tác giả không tồn tại, trả về lỗi
        if (!$tacgia) {
            return response()->json(['error' => 'Tác giả không tồn tại!'], 404);
        }

        // Xóa tác giả
        $tacgia->delete();

        // Chuyển hành trang
        return redirect()->route('tacgia')
            ->with('success', 'Tác giả đã được xóa thành công!');
    }
}
