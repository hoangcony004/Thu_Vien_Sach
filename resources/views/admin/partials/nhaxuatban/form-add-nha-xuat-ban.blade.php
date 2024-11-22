<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thêm Nhà Xuất Bản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->
            <form action="{{ route('addNhaXuatBan') }}" method="post">
                @csrf
                <div class="modal-body">
                    <!-- Các ô input điền thông tin -->
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Tên Nhà Xuất Bản</label>
                        <input type="text" class="form-control" id="inputName" name="tenNhaXuatBan" required
                            placeholder="Nhập tên nhà xuất bản...">
                    </div>

                    <div class="mb-3">
                        <label for="inputAddress" class="form-label">Số Điện Thoại</label>
                        <input type="number" class="form-control" name="soDienthoai" id="input" required
                            placeholder="Nhập số điện thoại...">
                    </div>

                    <div class="mb-3">
                        <label for="inputAddress" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="input" placeholder="Nhập email...">
                    </div>

                    <div class="mb-3">
                        <label for="inputName" class="form-label">Địa Chỉ</label>
                        <textarea class="form-control" name="diaChi" required
                            placeholder="Nhập địa chỉ(VD: Ngõ 1, Lê Văn Thiêm, Nhân Chính, Thanh Xuân, Hà Nội)..."></textarea>
                    </div>

                </div> <!-- end modal body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Thêm Mới</button>
                </div> <!-- end modal footer -->
            </form>
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div>