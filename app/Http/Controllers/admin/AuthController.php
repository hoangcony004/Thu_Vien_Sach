<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $title;

    public function index(Request $request) {}

    public function getLogin()
    {
        // khai báo title
        $this->title = 'Admin - Login';

        // Lấy URL người dùng truy cập trước khi vào trang login
        $previousUrl = url()->previous();
        $loginUrl = route('login');

        // Kiểm tra nếu URL trước không phải là trang login và session chưa có URL lưu trữ
        if (!session()->has('url.intended') && $previousUrl !== $loginUrl) {
            session()->put('url.intended', $previousUrl);
        }

        // chuyển hướng và truyền thông báo xuống
        return view('admin.auth.login-admin')->with('title', $this->title);
    }

    public function postLogin(Request $request)
    {
        // kiểm duyệt dữ liệu với thông báo lỗi tùy chỉnh
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ], [
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'g-recaptcha-response.required' => 'Vui lòng xác nhận rằng bạn không phải là robot.',
            'g-recaptcha-response.captcha' => 'Xác minh reCAPTCHA không thành công, vui lòng thử lại.',
        ]);

        // Xử lý đăng nhập sau khi kiểm tra reCAPTCHA
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            session()->flash('success', 'Đăng nhập thành công!');
            $user = Auth::user();
            session(['name' => $user->name]);
            session(['role' => $user->role]);
            // Lấy URL đã lưu trước khi đăng nhập hoặc chuyển hướng đến dashboard nếu không có
            return redirect()->intended(route('dashboard'));
        } else {
            session()->flash('error', 'Sai tên đăng nhập hoặc mật khẩu!');
            return redirect()->back()->withInput();
        }

        // Nếu đăng nhập không thành công
        session()->flash('error', 'Thông tin đăng nhập không đúng.'); // Thông báo lỗi
        return redirect()->back()->withInput(); // Giữ lại các giá trị đã nhập
    }


    public function getlogout()
    {
        Auth::logout(); // Đăng xuất người dùng

        // truyền thông báo xuống
        session()->flash('success', 'Đăng xuất thành công.');
        return redirect()->route('login'); // Chuyển hướng đến trang đăng nhập
    }
}