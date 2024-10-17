<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    protected $title;

    public function index(Request $request) {}

    public function getTheLoai() {
        // khai báo title
        $this->title = 'Admin - Theloai';

        // chuyển hướng và truyền thông báo xuất
        return view('admin.pages.the-loai')
            ->with('title', $this->title);
    }
}