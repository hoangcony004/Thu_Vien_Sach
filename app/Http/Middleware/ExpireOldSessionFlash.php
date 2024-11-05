<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ExpireOldSessionFlash
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra nếu có thông báo success và thời gian hết hạn
        if (Session::has('success') && Session::has('success_expires_at')) {
            $expiresAt = Session::get('success_expires_at');

            // Nếu đã hết hạn, xóa thông báo
            if (Carbon::now()->greaterThanOrEqualTo($expiresAt)) {
                Session::forget('success');
                Session::forget('success_expires_at');
            }
        }

        return $next($request);
    }
}