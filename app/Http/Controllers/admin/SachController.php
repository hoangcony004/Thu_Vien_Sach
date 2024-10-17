<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SachController extends Controller
{
    protected $title;

    public function index(Request $request) {}

    public function getBooks()
    {
        // khai báo title
        $this->title = 'Admin - Kho Sách';

        return view('admin.pages.sach')
            ->with('title', $this->title);
    }
}