<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>
    <label for="password">Mật khẩu mới:</label>
    <input type="password" name="password" required><br><br>
    <label for="password_confirmation">Xác nhận mật khẩu:</label>
    <input type="password" name="password_confirmation" required><br><br>
    <button type="submit">Đổi mật khẩu</button>
</form>