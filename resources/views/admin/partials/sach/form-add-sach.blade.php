<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thêm Sách</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->
            <div class="modal-body">
                <!-- Form trong modal -->
                <form action="{{ route('Psach') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="maTacGia" class="form-label">Tên Sách:</label>
                        <input type="text" class="form-control" id="inputName" name="tenSach" required
                            placeholder="Nhập tên quyển sách...">
                    </div>

                    <div class="mb-3">
                        <label for="maTacGia" class="form-label">Tác Giả:</label>
                        <select name="maTacGia" id="maTacGia" class="form-control select2-ajax" required></select>
                    </div>

                    <div class="mb-3">
                        <label for="maTheLoai" class="form-label">Thể Loại:</label>
                        <select name="maTheLoai" id="maTheLoai" class="form-control select2-ajax" required></select>
                    </div>

                    <div class="mb-3">
                        <label for="maNhaXuatBan" class="form-label">Nhà Xuất Bản:</label>
                        <select name="maNhaXuatBan" id="maNhaXuatBan" class="form-control select2-ajax"
                            required></select>
                    </div>

                    <!-- Dòng gồm 2 cột: Ngày Xuất Bản và Số Lượng -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="ngayXuatBan" class="form-label">Ngày Xuất Bản:</label>
                            <input type="date" class="form-control" id="ngayXuatBan" name="ngayXuatBan" required
                                placeholder="Nhập ngày xuất bản...">
                        </div>
                        <div class="col-md-6">
                            <label for="soLuong" class="form-label">Số Lượng:</label>
                            <input type="number" class="form-control" id="soLuong" name="soLuong" required
                                placeholder="Nhập số lượng...">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="moTa" class="form-label">Mô Tả:</label>
                        <textarea class="form-control" name="moTa" required
                            placeholder="Nhập mô tả về sách (Khoảng 100 từ)..."></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div> <!-- end modal footer -->
                </form>
            </div> <!-- end modal body -->
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div>


<script>
$(document).ready(function() {
    // Khi modal hiển thị, khởi tạo Select2
    $('#staticBackdrop').on('shown.bs.modal', function() {
        // Tác Giả
        $('#maTacGia').select2({
            placeholder: 'Tìm kiếm tác giả...',
            allowClear: true,
            dropdownParent: $('#staticBackdrop'), // Đặt dropdown trong modal
            ajax: {
                url: '/api/tac-gia', // API lấy dữ liệu tác giả
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term // Từ khóa tìm kiếm
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.id,
                                text: item.tenTacGia
                            };
                        })
                    };
                },
                cache: true
            }
        });

        // Thể Loại
        $('#maTheLoai').select2({
            placeholder: 'Tìm kiếm thể loại...',
            allowClear: true,
            dropdownParent: $('#staticBackdrop'),
            ajax: {
                url: '/api/the-loai',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.id,
                                text: item.tenTheLoai
                            };
                        })
                    };
                },
                cache: true
            }
        });

        // Nhà Xuất Bản
        $('#maNhaXuatBan').select2({
            placeholder: 'Tìm kiếm nhà xuất bản...',
            allowClear: true,
            dropdownParent: $('#staticBackdrop'),
            ajax: {
                url: '/api/nha-xuat-ban',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.id,
                                text: item.tenNhaXuatBan
                            };
                        })
                    };
                },
                cache: true
            }
        });
    });
});
</script>