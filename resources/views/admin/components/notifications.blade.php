<!-- Right Sidebar -->
<div class="end-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="end-bar-toggle float-end">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h5 class="m-0">Thông Báo</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar="">
        <div class="p-3">
            <div style="max-height: 230px; max-width: 100%; overflow: auto; white-space: nowrap;" data-simplebar>
                <div id="right-sidebar-notifications-list">
                    <?php
                    $notificationCount = count($notifications); // Đếm số lượng thông báo
                    ?>

                    <?php if ($notificationCount > 0): ?>
                    <?php foreach ($notifications as $index => $notification): ?>
                    <div
                        class="dropdown-item text-center notify-item <?php echo $notification['type'] === 'success' ? 'text-success' : 'text-danger'; ?>">
                        <?php echo e($notification['message']); ?>
                    </div>

                    <?php if ($index < $notificationCount - 1): ?>
                    <hr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p class="dropdown-item text-center notify-item notify-all">Không có thông báo nào</p>
                    <?php endif; ?>
                </div>
            </div>
        </div> <!-- end padding -->
    </div>
</div>