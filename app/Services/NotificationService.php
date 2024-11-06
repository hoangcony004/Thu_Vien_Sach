<?php
// app/Services/NotificationService.php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class NotificationService
{
    public function addNotification($message, $type)
    {
        // Lấy thông báo hiện tại từ session
        $notifications = Session::get('notifications', []);

        // Thêm thông báo mới vào mảng
        $notifications[] = [
            'message' => $message,
            'type' => $type,
        ];

        // Giới hạn số lượng thông báo
        if (count($notifications) > 100) {
            array_shift($notifications); // Xóa thông báo cũ nhất
        }

        // Cập nhật lại session
        Session::put('notifications', $notifications);
    }
}