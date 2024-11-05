<!-- Modal Danger Header -->
<div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="danger-header-modalLabel">Xóa Thể Loại
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form id="delete-form" method="post">
                    @csrf
                    <p>Bạn có chắc chắn muốn xóa không?</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript để lấy id từ thẻ a và gắn vào action của form -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var deleteModal = document.getElementById('danger-header-modal');

    deleteModal.addEventListener('show.bs.modal', function(event) {
        // Lấy thẻ a đã được nhấn để mở modal
        var button = event.relatedTarget;
        var theLoaiId = button.getAttribute('data-id');

        // Cập nhật action của form để bao gồm prefix '/public/admin/the-loai/xoa-the-loai'
        var form = document.getElementById('delete-form');
        form.action =
            `/public/admin/the-loai/xoa-the-loai/${theLoaiId}`;
    });
});
</script>