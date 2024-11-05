<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NotificationService;

class SachController extends Controller
{
    protected $title;

    protected $notificationService; // Khai báo service thông báo

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService; // Khởi tạo service thông báo
    }

    public function index(Request $request) {}

    public function getBooks()
    {
        // khai báo title
        $this->title = 'Admin - Kho Sách';

        return view('admin.pages.sach')
            ->with('title', $this->title);
    }
}