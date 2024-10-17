<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TacGiaController extends Controller
{
    protected $title;

    public function index(Request $request) {}

    public function getTacgia() {
        // khai báo title
        $this->title = 'Admin - Tacgia';

        // chuyển hướng và truyền thông báo xuất
        return view('admin.pages.tac-gia')
            ->with('title', $this->title);
    }
}