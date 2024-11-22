<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Mật Khẩu</title>
    <!-- Link CSS của Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Link icon của Bootstrap -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
    /* Custom style để cố định icon mắt bên phải và không bị ảnh hưởng khi nhấp vào */
    .input-group {
        position: relative;
    }

    .input-group .eye-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6c757d;
    }

    /* Đảm bảo input không bị che mất bởi icon */
    .input-group input {
        padding-right: 40px;
        /* Tạo không gian cho icon mắt */
    }

    /* Đảm bảo label và input xếp thẳng hàng theo cột */
    .form-label {
        margin-bottom: 0.5rem;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <form id="resetPasswordForm" action="{{ route('password.update') }}" method="POST"
            class="p-4 border rounded bg-white shadow" style="width: 100%; max-width: 400px;">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-3">
                <h2 class="text-center">Đổi Mật Khẩu</h2>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control"
                    placeholder="Vui lòng nhập email để xác minh.">
                <div class="text-danger mt-1" id="emailError"></div>
            </div>

            <div class="mb-3 input-group">
                <label for="password" class="form-label">Mật khẩu mới:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu mới.">
                <span class="eye-icon" onclick="togglePasswordVisibility('password', 'passwordIcon')">
                    <i id="passwordIcon" class="bi bi-eye-slash"></i>
                </span>
                <div class="text-danger mt-1" id="passwordError"></div>
            </div>

            <div class="mb-3 input-group">
                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    placeholder="Xác nhận mật khẩu.">
                <span class="eye-icon"
                    onclick="togglePasswordVisibility('password_confirmation', 'passwordConfirmationIcon')">
                    <i id="passwordConfirmationIcon" class="bi bi-eye-slash"></i>
                </span>
                <div class="text-danger mt-1" id="passwordConfirmationError"></div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Đổi mật khẩu</button>
        </form>
    </div>

    <!-- Link JavaScript của Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <!-- JavaScript kiểm tra dữ liệu -->
    <script>
    document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
        event.preventDefault();

        document.getElementById('emailError').textContent = '';
        document.getElementById('passwordError').textContent = '';
        document.getElementById('passwordConfirmationError').textContent = '';

        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let passwordConfirmation = document.getElementById('password_confirmation').value;

        let hasError = false;

        if (email === '') {
            document.getElementById('emailError').textContent = 'Vui lòng nhập email.';
            hasError = true;
        }

        if (password === '') {
            document.getElementById('passwordError').textContent = 'Vui lòng nhập mật khẩu mới.';
            hasError = true;
        } else if (password.length < 6) {
            document.getElementById('passwordError').textContent = 'Mật khẩu phải có ít nhất 6 ký tự.';
            hasError = true;
        }

        if (passwordConfirmation === '') {
            document.getElementById('passwordConfirmationError').textContent = 'Vui lòng xác nhận mật khẩu.';
            hasError = true;
        } else if (password !== passwordConfirmation) {
            document.getElementById('passwordConfirmationError').textContent = 'Mật khẩu xác nhận không khớp.';
            hasError = true;
        }

        if (!hasError) {
            this.submit();
        }
    });

    function togglePasswordVisibility(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        }
    }
    </script>
</body>

</html>