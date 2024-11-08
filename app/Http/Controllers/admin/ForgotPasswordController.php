<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    protected $title;

    public function showLinkRequestForm()
    {
        // Khai báo title
        $this->title = 'Admin - Reset Password';

        return view('admin.auth.form-reset-password')
            ->with('title', $this->title);
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Tạo token và lưu vào bảng password_resets
        $token = Str::random(60);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        // Gửi email
        $link = url('/reset-password/' . $token);
        Mail::send('admin.auth.password-reset', ['link' => $link], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'Đã gửi email xác minh thành công!');
    }

    public function showResetForm($token)
    {
        return view('admin.auth.reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $reset = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (!$reset || !Hash::check($request->token, $reset->token)) {
            return back()->withErrors(['email' => 'Liên kết đặt lại mật khẩu không hợp lệ!']);
        }

        // Đổi mật khẩu cho người dùng
        $user = \App\Models\User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->r_password = $request->password;
        $user->save();

        // Xóa token reset password sau khi hoàn thành
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Mật khẩu đã được thay đổi thành công!');
    }
}