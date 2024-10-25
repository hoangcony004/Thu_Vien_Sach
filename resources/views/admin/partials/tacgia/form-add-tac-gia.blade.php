<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thêm Tác Giả</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->
            <form action="{{ route('Ptacgia') }}" method="post">
                @csrf
                <div class="modal-body">
                    <!-- Các ô input điền thông tin -->
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Tên Tác Giả</label>
                        <input type="text" class="form-control" id="inputName" name="tenTacGia" required
                            placeholder="Nhập tên tác giả...">
                    </div>

                    <div class="mb-3">
                        <label for="inputAddress" class="form-label">Ngày Sinh</label>
                        <input type="date" class="form-control" name="ngaySinh" id="input" required
                            placeholder="Nhập ngày sinh...">
                    </div>

                    <div class="mb-3">
                        <label for="inputAddress" class="form-label">Ngày Mất(Nếu tác giả chưa mất thì bỏ trống)</label>
                        <input type="date" class="form-control" name="ngayMat" id="input"
                            placeholder="Nhập ngày mất...">
                    </div>

                    <div class="mb-3">
                        <label for="inputName" class="form-label">Mô tả về tác giả</label>
                        <textarea class="form-control" name="moTa" required
                            placeholder="Nhập mô tả về tác giả..."></textarea>
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