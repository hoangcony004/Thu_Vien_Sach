<ul class="list-unstyled topbar-menu float-end mb-0">
    <li class="dropdown notification-list d-lg-none">
        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <i class="dripicons-search noti-icon"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
            <form class="p-3" action="" method="GET">
                <input type="text" name="query" class="form-control" placeholder="Tìm kiếm chức năng..." required
                    aria-label="Recipient's username">
            </form>

        </div>
    </li>

    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <i class="dripicons-bell noti-icon"></i>

            <!-- Hiển thị số lượng thông báo hoặc ẩn thẻ nếu không có thông báo -->
            <?php
            // Đếm số lượng thông báo thành công (success) và lỗi (error)
            $notificationCount = 0;

            // Kiểm tra xem có thông báo thành công hay lỗi trong session không
            if (session()->has('success') || session()->has('error')) {
                // Tính số lượng thông báo thành công và lỗi
                $notificationCount = 0;
                if (session()->has('success')) {
                    $notificationCount++;
                }
                if (session()->has('error')) {
                    $notificationCount++;
                }
            }
            ?>

            <!-- Nếu có thông báo, hiển thị thẻ span với số lượng thông báo, nếu không thì không hiển thị -->
            <?php if ($notificationCount > 0): ?>
            <span
                class="badge <?php echo (session()->has('success')) ? 'bg-success' : ''; ?>"><?php echo $notificationCount; ?></span>
            <?php endif; ?>
        </a>

        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
            <!-- item-->
            <div class="dropdown-item noti-title">
                <h5 class="m-0">
                    <span class="float-end">
                        <a href="javascript: void(0);" class="text-dark" id="clear-notifications">
                            <small>Xóa tất cả</small>
                        </a>
                    </span>Thông báo
                </h5>
            </div>

            <div style="max-height: 230px;" data-simplebar="">
                <!-- item thông báo từ PHP-->
                <div id="notifications-list">
                    <?php if (session()->has('success')): ?>
                    <p class="dropdown-item text-center text-success notify-item">
                        <?php echo e(session('success')); ?>
                    </p>
                    <?php endif; ?>
                    <?php if (session()->has('error')): ?>
                    <p class="dropdown-item text-center text-danger notify-item">
                        <?php echo e(session('error')); ?>
                    </p>
                    <?php endif; ?>
                    <?php if (!session()->has('success') && !session()->has('error')): ?>
                    <p class="dropdown-item text-center text-success notify-item notify-all">Không có thông báo nào</p>
                    <?php endif; ?>
                </div>

                <!-- item khi không còn thông báo -->
                <p class="dropdown-item text-center text-success notify-item notify-none" style="display:none;">Không có
                    thông báo nào</p>
            </div>

            <!-- All-->
            <a href="#" class="dropdown-item text-center text-primary notify-item notify-all">
                Xem tất cả
            </a>
            <!-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                data-bs-target="#right-modal">Rightbar Modal</button> -->
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clearNotificationsButton = document.getElementById('clear-notifications');
            const notificationsList = document.getElementById('notifications-list');
            const noNotificationsMessage = document.querySelector('.notify-none');
            const notificationBadge = document.querySelector('.noti-icon-badge');

            clearNotificationsButton.addEventListener('click', function() {
                // Ẩn tất cả thông báo cũ
                notificationsList.innerHTML = '';

                // Hiển thị thông báo "Không có thông báo nào"
                noNotificationsMessage.style.display = 'block';

                // Ẩn thẻ span nếu không có thông báo
                notificationBadge.style.display = 'none';
            });

            // Kiểm tra số lượng thông báo để cập nhật thẻ span
            const notificationCount = <?php echo $notificationCount; ?>;
            if (notificationCount === 0) {
                notificationBadge.style.display = 'none'; // Ẩn thẻ span nếu không có thông báo
            } else {
                notificationBadge.style.display = 'inline-block'; // Hiển thị thẻ span nếu có thông báo
            }
        });
        </script>
    </li>


    <li class="dropdown notification-list d-none d-sm-inline-block">
        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <i class="dripicons-view-apps noti-icon"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

            <div class="p-2">
                <div class="row g-0">
                    <div class="col">
                        <a class="dropdown-icon-item" href="https://www.google.com">
                            <img src="{{ asset('admin/assets/images/brands/g-suite.png') }}" alt="G Suite">
                            <span>Google</span>
                        </a>
                    </div>

                    <div class="col">
                        <a class="dropdown-icon-item" href="https://classroom.google.com">
                            <img src="{{ asset('admin/assets/images/brands/google-classroom.jpg') }}" alt="G Suite">
                            <span>Google Classroom</span>
                        </a>
                    </div>

                    <div class="col">
                        <a class="dropdown-icon-item" href="https://zoom.us">
                            <img src="{{ asset('admin/assets/images/brands/zoom.png') }}" alt="G Suite">
                            <span>Zoom</span>
                        </a>
                    </div>
                </div> <!-- end row-->
            </div>

        </div>
    </li>

    <li class="notification-list">
        <a class="nav-link end-bar-toggle" href="javascript: void(0);">
            <i class="dripicons-gear noti-icon"></i>
        </a>
    </li>

    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <span class="account-user-avatar">
                <img src="{{ asset('admin/assets/images/users/user.jpg') }}" alt="user-image" class="rounded-circle">
            </span>
            <span>
                @if(session('name'))
                <span class="account-user-name">{{ session('name') }}</span>
                @endif

                @if(session('role') == 1)
                <span class="account-position">Admin</span>
                @else
                <span class="account-position">{{ session('role') }}</span>
                @endif
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
            <!-- item-->
            <!-- <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">ID của bạn là: 4</h6>
            </div> -->

            <!-- item-->
            <a href="" class="dropdown-item notify-item">
                <i class="mdi mdi-account-circle me-1"></i>
                <span>Tài khoản</span>
            </a>

            <!-- item-->
            <a href="#" class="dropdown-item notify-item">
                <i class="uil-cog font-16 me-1"></i>
                <span>Cài đặt</span>
            </a>

            <!-- item-->
            <!-- <a href="#" class="dropdown-item notify-item">
                    <i class="mdi mdi-lifebuoy me-1"></i>
                    <span>Hỗ trợ</span>
                </a> -->

            <!-- item-->
            <!-- <a href="#" class="dropdown-item notify-item">
                    <i class="mdi mdi-lock-outline me-1"></i>
                    <span>Khóa tài khoản</span>
                </a> -->

            <!-- item -->
            <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                <i class="mdi mdi-logout me-1"></i>
                <span>Đăng xuất</span>
            </a>
        </div>
    </li>

</ul>

<!-- Right modal content -->
<div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="true"
    data-bs-keyboard="true">
    <div class="modal-dialog modal-sm modal-right">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h4 class="mt-0">Text in a modal</h4>
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>