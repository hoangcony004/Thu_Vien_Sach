<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NotificationService; 

class AdminController extends Controller
{
    protected $title;

    protected $notificationService; // Khai báo service thông báo

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService; // Khởi tạo service thông báo
    }

    public function index(Request $request) {}

    public function getDashboard()
    {
        // khai báo title
        $this->title = 'Admin - Dashboard';

        // chuyển hướng và truyền thông báo xuống
        return view('admin.pages.dashboard')
            ->with('title', $this->title);
    }
}